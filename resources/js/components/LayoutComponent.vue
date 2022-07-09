<template>
    <div class="container-fluid | d-flex">
        <Columns
            v-if="Object.keys(columns).length > 0"
            v-for="column in columns"
            :column="column"
            @load-columns="loadColumns"
        >
        </Columns>
        <div
            class="add-column"
            v-text="'Add Column'"
            v-b-modal.add-column
            @column-added="columnAdded"
        ></div>
        <div class="export-database" @click="exportDatabase">
            Export DB
        </div>
        <!-- Modals -->
        <AddColumn></AddColumn>
        <AddCard ref="add-card-modal" :columnId="currentColumn" :edit="editMode"></AddCard>
    </div>
</template>

<script>

import Columns from "./partials/Columns";
import AddColumn from "./partials/modals/AddColumn";
import AddCard from "./partials/modals/AddCard";

export default {
    components: {
        Columns,
        AddColumn,
        AddCard
    },
    data() {
        return {
            columns : {},
            currentColumn : null,
            editMode      : false
        }
    },
    methods: {
        columnAdded(columns) {
            this.columns = columns
        },

        loadColumns() {
            axios.get('column/info')
                .then(response => {
                    this.columns = response.data
                }).catch(error => {

            })
        },

        exportDatabase() {
            axios.post('export-database')
                .then(response => {

                }).catch(error => {

            })
        },

        addCard(currentColumn, editMode) {
            this.currentColumn = currentColumn
            this.editMode      = editMode
            this.$refs['add-card-modal'].$refs['add-new-card'].show();
        }
    },

    mounted() {
        this.loadColumns()
    }
}
</script>
