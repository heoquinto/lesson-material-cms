<template>
    <div class="lm-cms-main-container">
        <b-card no-body>
            <b-tabs card>
                <b-tab title="Pages" active>
                    <data-table url="pages" :columns="columns" ref="table">
                        <template slot="actionButtons" slot-scope="{row}">
                            <b-button @click="viewPage(row.id)" size="sm" variant="light">View <b-icon icon="eye" font-scale="1" /></b-button>
                            <b-button @click="editPage(row.id)" size="sm" variant="primary">
                                Edit <b-icon icon="pencil-square" font-scale="1" />
                            </b-button>
                            <!-- <b-button size="sm" variant="secondary">
                                Settings <b-icon icon="gear-fill" font-scale="1" />
                            </b-button> -->
                            <b-button @click="deletePage(row.id)" size="sm" variant="danger">
                                Delete <b-icon icon="trash-fill" font-scale="1" />
                            </b-button>
                        </template>
                    </data-table>
                    <modal btn-name="Add new page" ref="modal">
                        <form-input v-model="field.title" title="Title" />
                        <form-input v-model="field.url" title="URL" />
                        <div class="mt-4">
                            <h6>Page Details</h6>
                            <form-input title="Program" />
                            <form-input title="Level" />
                            <form-input title="Rank" />
                            <form-input title="Lesson" />
                        </div>
                        <b-button @click="savePage" variant="primary">
                            Save
                        </b-button>
                    </modal>
                </b-tab>
            </b-tabs>
        </b-card>
    </div>
</template>

<style scoped>
.lm-cms-main-container {
    width: 90%;
    margin: auto;
    margin-top: 50px;
}
</style>

<script>
'use strict';

import axios from "axios";
import DataTable from "src/components/data-table/DataTable";

export default {
    name: 'Dashboard',

    components: {
        DataTable,
    },

    data() {
        return {
            field: {
                title: null,
                url: null,
            },
        };
    },

    computed: {
        columns() {
            return ["title", "url", "actions"];
        },
    },

    mounted() {
        this.modal = this.$refs.modal;
        this.table = this.$refs.table;
    },

    methods: {
        savePage() {
            axios
                .post("pages", this.field)
                .then(() => {
                    this.modal.hideModal();
                    this.$notification.success(
                        "Page has been successfully created."
                    );
                    this.table.reloadData();
                })
                .catch(function (error) {
                    console.log(error);
                });
        },

        editPage(pageId) {
            this.$router.push({ path: `/page/edit/${pageId}`});
        },

        viewPage(pageId) {
            window.open("/published/"+pageId, "_blank");
        },

        deletePage(pageId) {
            axios
                .delete('/delete-page/' + pageId)
                .then(() => {
                     this.$notification.success(
                        "Page has been successfully deleted."
                    );
                    this.table.reloadData();
                })
                .catch(function (error) {
                    console.log(error);
                });
        }
    },
}
</script>
