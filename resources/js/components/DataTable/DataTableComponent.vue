<template>
<div class="p-10">
    <div v-if="table_attributes.title" class="px-2">
        <h1 class="border-b-8 border-blue-900 inline-block mb-2 text-xl">{{table_attributes.title}}</h1>
    </div>
    <div class="overflow-x-auto">
        <table class="table px-2 border-separate space-y-6 w-full">
            <thead class="bg-gray-900 text-white">
            <tr>
                <th v-if="table_attributes.bulkAction" class="p-3 whitespace-nowrap max-w-xs align-top text-left">
                    <div class="relative">
                        <input type="checkbox" class="form-checkbox text-blue-600 cursor-pointer" v-model="bulkAll" @change="bulkCheckAll"/>
                        <i class="fas fa-level-down-alt ml-1 absolute top-1.5"></i>
                    </div>
                </th>
                <th class="p-3 whitespace-nowrap max-w-xs" :class="{ 'align-top': !field.isSearchable }" v-for="(field, index) in table_fields" :key="index">
                    <div>
                        <span :class="{ 'mr-1': field.isOrderable }">{{field.title}}</span>
                        <span class="cursor-pointer" v-if="field.isOrderable">
                            <i class="fas fa-sort-amount-down" @click="sortChange(field.name, 'asc')" v-if="params.sort_direction === 'desc'"></i>
                            <i class="fas fa-sort-amount-up-alt"  @click="sortChange(field.name, 'desc')" v-if="params.sort_direction === 'asc'"></i>
                        </span>
                    </div>
                    <div class="py-2" v-if="field.isSearchable">
                        <input type="text" v-model="params[field.name]" class="appearance-none bg-gray-200 text-gray-700 border border-gray-200 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500">
                    </div>
                </th>
                <th v-if="table_attributes.rowActionButtons"></th>
            </tr>
            </thead>
            <tbody class="text-black font-medium">
            <tr class="bg-white h-16 relative" v-for="(item, index) in tableData" :key="index">
                <td class="p-3 whitespace-nowrap text-left" v-if="table_attributes.bulkAction">
                    <input type="checkbox" class="form-checkbox text-blue-600 cursor-pointer" v-model="bulkElements[item[this.table_attributes.key]]"/>
                </td>
                <td class="p-3 whitespace-nowrap text-center" v-for="(field, index) in table_fields" :key="index">
                     {{item[field.name]}}
                </td>
                <td class="action-button text-right pr-3 relative" v-if="table_attributes.rowActionButtons">
                    <i class="fas fa-ellipsis-v cursor-pointer" @click="openRowAction(item[this.table_attributes.key])"></i>
                    <row-action-buttons-component :is_open="this.rowActions[item[this.table_attributes.key]]" v-if="this.rowActions[item[this.table_attributes.key]]">
                        <action-button-component v-for="(actionButton, index) in table_attributes.rowActionButtons" :key="index"
                                                 :type="actionButton.type" :icon-class="actionButton.iconClass" @click="deleteRow(item[this.table_attributes.key], actionButton.route)"></action-button-component>
                    </row-action-buttons-component>
                </td>
            </tr>
            </tbody>
        </table>
    </div>
</div>
</template>

<script>
    import axios from 'axios';
    import RowActionButtonsComponent from "./RowActionButtons/RowActionButtonsComponent";
    import ActionButtonComponent from "./RowActionButtons/ActionButtonComponent";

    export default {
        name: "DataTableComponent",
        components: {ActionButtonComponent, RowActionButtonsComponent},
        props: {
            table_fields: {
                type: Object
            },
            data: {
                type: Object
            },
            table_attributes: {
                type: Object,
            }
        },
        data: () => {
            return {
                tableData: [],
                bulkAll: false,
                bulkElements: [],
                selected: {},
                params: {
                    sort_field: 'created_at',
                    sort_direction: 'desc'
                },
                search: '',
                rowActions: []
            }
        },
        methods: {
            loadTableData() {
                axios.get('/test-table', {
                    params: {
                        ...this.params
                    }
                }).then(response => {
                        this.tableData = response.data;
                })
            },

            bulkCheckAll() {
                this.bulkElements.forEach((val, key) => {
                    this.bulkElements[key] = this.bulkAll;
                });
            },

            sortChange(field, direction) {
                if (this.params.sort_field !== field) {
                    this.params.sort_field = field;
                    this.params.sort_direction = 'desc';
                    return;
                }

                this.params.sort_direction = direction;

            },

            openRowAction(id) {

                if (this.rowActions[id] === true) {
                    this.rowActions[id] = !this.rowActions[id];
                    return;
                }

                this.rowActions.forEach((value, index) => {
                    this.rowActions[index] = false;
                });

                this.rowActions[id] = true;
            },

            deleteRow(id, route) {
                axios.delete(route + '/' + id)
                    .then(response => {
                        this.tableData = this.tableData.filter(element => element[this.table_attributes.key] !== id);
                    })
            }
        },
        watch: {
            params: {
                handler () {
                    if (this.timer) {
                        clearTimeout(this.timer);
                        this.timer = null;
                    }
                    this.timer = setTimeout(() => {
                        this.loadTableData();
                    }, 800);
                },
                deep: true
            }
        },
        mounted() {

            this.tableData = this.data;
            if (this.table_attributes.bulkAction) {
                this.bulkElements = new Array( this.tableData.length + 1).fill(false, 1);
            }

            this.rowActions = new Array( this.tableData.length + 1).fill(false, 1);
        }
    }
</script>

<style scoped>
    .table {
        border-spacing: 0 15px;
    }

    .table tr {
        box-shadow: 2px 2px 5px #888888;
    }
</style>
