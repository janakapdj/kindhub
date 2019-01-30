<template>
    <div>
        <h3>Create student</h3>
        <form @submit.prevent="addStudent">
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label>First name:</label>
                        <input required type="text" class="form-control" v-model="student.first_name">
                    </div>
                    <div class="form-group">
                        <label>Last name:</label>
                        <input required type="text" class="form-control" v-model="student.last_name">
                    </div>
                    <div class="form-group">
                        <label>Join year:</label>
                        <select required class="form-control" v-model="student.join_year">
                            <option value="2019">2019</option>
                            <option value="2020">2020</option>
                            <option value="2021">2021</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Gender:</label>
                        <select required class="form-control" v-model="student.gender">
                            <option value="M">Male</option>
                            <option value="F">Female</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Class Room:</label>
                        <select required class="form-control" v-model="student.class_room_id">
                            <option v-for="item in class_rooms" :value="item.id">{{item.class_name}}</option>
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
                student:{},
                class_rooms:{}
            }
        },
        created() {
            let uri = '/api/class_rooms';
            this.axios.get(uri).then(response => {
                this.class_rooms = response.data;
            });
        },
        methods: {
            addStudent(){
                let uri = '/api/student/create';
                this.axios.post(uri, this.student).then((response) => {
                    this.$router.push({name: 'home'});
                });
            }
        }
    }
</script>