<template>
    <div>
        <h3>Edit Teacher</h3>
        <form @submit.prevent="updateTeacher">
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Teacher:</label>
                        <input type="text" class="form-control" v-model="teacher.teacher_name">
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
                teacher: {}
            }
        },
        created() {
            let uri = `/api/teacher/edit/${this.$route.params.id}`;
            this.axios.get(uri).then((response) => {
                this.teacher = response.data;
               // console.log(this.$route.params.id);
            });
        },
        methods: {
            updateTeacher() {
                let uri = `/api/teacher/update/${this.$route.params.id}`;
                this.axios.post(uri, this.teacher).then((response) => {
                    this.$router.push({name: 'teachers'});
                });
            }
        }
    }
</script>