<template>
    <div class="column-holder">
        <div class="column-title">
            <h4 v-text="column.title"></h4>
            <b-dropdown text="..." variant="outline-secondary">
                <b-dropdown-item @click="removeColumn">Remove Column</b-dropdown-item>
                <b-dropdown-item @click="addCard(column.id)">Add new card</b-dropdown-item>
            </b-dropdown>
        </div>
        <div class="column-cards-section">
            <div class="card-items" v-if="column.cards.length > 0" v-for="card in column.cards">
                <div class="card-section-header" @click="openEdit">
                    <h4 v-text="card.title"></h4>
                    <b-dropdown text="..." variant="outline-secondary">
                        <b-dropdown-item @click="removeCard(card.id)">Remove Card</b-dropdown-item>
                    </b-dropdown>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        props: ['column'],

        data() {
            return {
                currentColumn : null,
                edit : false
            }
        },

        methods : {
            removeColumn() {
                axios.delete('column/remove/' + this.column.id)
                    .then(response => {
                        this.$parent.loadColumns()
                    })
            },
            removeCard(cardId) {
                axios.delete('card/remove/' + cardId)
                    .then(response => {
                        this.$parent.loadColumns()
                    })
            },
            loadColumns() {
                this.$parent.loadColumns();
            },

            addCard(columnId) {
                this.$parent.addCard(columnId)
            },

            openEdit() {

            }
        }
    }
</script>
