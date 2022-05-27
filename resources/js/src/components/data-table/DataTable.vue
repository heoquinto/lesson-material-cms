<template>
    <div>
        <v-server-table
            ref="dataTable"
            :columns="columns"
            :options="DataTable_options"
        >
            <span slot="actions" slot-scope="{row}"> 
                <slot style="width: 20px" name="actionButtons" :row="row" />
            </span>
        </v-server-table>
    </div>
</template>

<style>
.VueTables__limit-field {
    margin-bottom: 20px;
    width: 20%;
}
</style>

<script>
const INITIAL_OPTIONS = {
    perPageValues: [15, 25],
};

export default {
    name: "Datatable",

    props: {
        url: {
            type: String,
            required: true,
        },

        columns: {
            type: Array,
            required: true,
        },
    },

    computed: {
        DataTable_options() {
            let options = {
                filterable: false,
                perPage: 15,
                requestAdapter(data) {
                    return {
                        order: data.ascending ? "ASC" : "DESC",
                        direction: "asc",
                        page: data.page,
                        limit: data.limit,
                        sort: "title",
                    };
                },
                requestFunction: async (data) => {
                    return axios
                        .get(this.url, {
                            params: data,
                        })
                        .catch(function (e) {});
                },
                responseAdapter: (response) => {
                    return {
                        data: response.data.data,
                        count: response.data.total,
                    };
                },
            };

            return Object.assign(options, INITIAL_OPTIONS);
        },
    },

    methods: {
        reloadData() {
            this.$refs.dataTable.getData();
        },
    },
};
</script>
