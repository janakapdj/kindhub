<template>
    <div>
        <h3>Edit Class</h3>
        <form @submit.prevent="updateClassRoom">
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Class Room:</label>
                        <input type="text" class="form-control" v-model="classRoom.class_name">
                    </div>
                </div>
            </div>
            <div class="form-group">
                <button class="btn btn-primary">Update</button>
            </div>
        </form>
    </div>
</template>

<script>
    export default {

        data() {
            return {
                classRoom: {}
            }
        },
        created() {
            let uri = `/api/class_room/edit/${this.$route.params.id}`;
            this.axios.get(uri).then((response) => {
                this.classRoom = response.data;
               // console.log(this.$route.params.id);
            });
        },
        methods: {
            updateClassRoom() {
                let uri = `/api/class_room/update/${this.$route.params.id}`;
                this.axios.post(uri, this.classRoom).then((response) => {
                    this.$router.push({name: 'class_rooms'});
                });
            }
        }
    }
</script>