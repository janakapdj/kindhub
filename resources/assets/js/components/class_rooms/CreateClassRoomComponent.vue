<template>
    <div>
        <h3>Create class</h3>
        <form @submit.prevent="addClassRoom">
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Class Room:</label>
                        <input type="text" required class="form-control" v-model="classRoom.class_name">
                    </div>
                    <div class="form-group">
                        <label>Teacher:</label>
                        <select required class="form-control" v-model="classRoom.teacher_id">
                            <option v-for="item in teachers" :value="item.id">{{item.teacher_name}}</option>
                        </select>
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
                classRoom:{},
                teachers:{}
            }
        },
        created() {
            let uri = '/api/teachers';
            this.axios.get(uri).then(response => {
                this.teachers = response.data;
            });
        },
        methods: {
            addClassRoom(){
                let uri = '/api/class_room/create';
                this.axios.post(uri, this.classRoom).then((response) => {
                    this.$router.push({name: 'class_rooms'});
                });
            }
        }
    }
</script>