<template>
    <div>
        <h3>Create teacher</h3>
        <form @submit.prevent="addTeacher">
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Teacher name:</label>
                        <input type="text" class="form-control" v-model="teacher.teacher_name">
                    </div>
                </div>
            </div>
            <div class="form-group">
                <button class="btn btn-primary">Create</button>
            </div>
        </form>
    </div>
</template>

<script>
    export default {
        data(){
            return {
                teacher:{}
            }
        },
        methods: {
            addTeacher(){
                let uri = '/api/teacher/create';
                this.axios.post(uri, this.teacher).then((response) => {
                    this.$router.push({name: 'teachers'});
                });
            }
        }
    }
</script>