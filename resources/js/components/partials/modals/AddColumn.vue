<template>
    <b-modal ref="add-column" id="add-column" centered hide-footer  :title="'Add a new Column'">
        <div class="form-group">
            <label for="column-title" class="control-label" v-text="'Column Name'"></label>
            <input type="text" v-model="title" class="form-control" @keydown="error = null">
            <span class="error" v-if="error" v-text="error"></span>
        </div>
        <div class="footer-button mt-3 d-flex justify-content-between">
            <b-button @click="$refs['add-column'].hide()" variant="primary">
                <i class="fas fa-times"></i>
                Cancel
            </b-button>
            <b-button @click="addColumn" variant="success">
                <i class="fas fa-check"></i>
                Confirm
            </b-button>
        </div>
    </b-modal>
</template>

<script>
    export default {
        data() {
            return {
                title : null,
                error : null
            }
        },
        methods: {
            addColumn() {
                axios.post('column/add', {title : this.title})
                    .then(response => {
                        this.$refs['add-column'].hide()
                        this.$parent.loadColumns()
                    }).catch(error => {
                         this.error = error.response.data.message
                })
            }
        }
    }
</script>
