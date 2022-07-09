<template>
    <b-modal ref="add-new-card" id="add-new-card" centered hide-footer  :title="'Add a new Card'">
        <div class="form-group">
            <label for="cart-title" class="control-label" v-text="'Card Title'"></label>
            <input type="text" v-model="title" class="form-control" @keydown="error = null">
            <span class="error" v-if="error" v-text="error"></span>
        </div>
        <div class="footer-button mt-3 d-flex justify-content-between">
            <b-button @click="$refs['add-new-card'].hide()" variant="primary">
                <i class="fas fa-times"></i>
                Cancel
            </b-button>
            <b-button @click="addCard" variant="success">
                <i class="fas fa-check"></i>
                Confirm
            </b-button>
        </div>
    </b-modal>
</template>

<script>
export default {

    props : ['columnId'],
    data() {
        return {
            title: null,
            description: null,
            error: null
        }
    },
    methods: {
        addCard() {

            let data = {
                title : this.title,
                column_id : this.columnId
            }

            axios.post('card/add', data)
                .then(response => {
                    this.$refs['add-new-card'].hide()
                    this.$parent.loadColumns()
                    this.title = null
                }).catch(error => {
                this.error = error.response.data.message
            })
        }
    }
}
</script>
