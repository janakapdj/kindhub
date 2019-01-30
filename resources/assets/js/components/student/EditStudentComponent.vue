<template>
    <div>
        <h3>Edit student</h3>
        <form @submit.prevent="updateStudent">
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label>First name:</label>
                        <input type="text" class="form-control" v-model="student.first_name">
                    </div>
                    <div class="form-group">
                        <label>Last name:</label>
                        <input type="text" class="form-control" v-model="student.last_name">
                    </div>
                    <div class="form-group">
                        <label>Gender:</label>
                        <select class="form-control" v-model="student.gender">
                            <option v-for="gender in gender_array" :selected="gender.value === student.gender"
                                    v-bind:value="gender.value">{{ gender.name }}
                            </option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Join year:</label>
                        <select class="form-control" v-model="student.join_year">
                            <option v-for="year in year_array" :selected="year.value === student.join_year"
                                    v-bind:value="year.value">{{ year.name }}
                            </option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Class Room:</label>
                        <select class="form-control" v-model="student.class_room_id">
                            <option v-for="class_room in class_rooms" :selected="class_room.id === student.class_room_id"
                                    v-bind:value="class_room.id">{{ class_room.class_name }}
                            </option>
                        </select>
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
                student: {},
                class_rooms: {},
                gender_array: [{value: 'M', name: 'Male'}, {value: 'F', name: 'Female'}],
                year_array: [{value: '2019', name: '2019'}, {value: '2020', name: '2020'}, {value: '2021', name: '2021'}]
            }
        },
        created() {
            let uri = `/api/student/edit/${this.$route.params.id}`;
            this.axios.get(uri).then((response) => {
                this.student = response.data.student;
                this.class_rooms = response.data.class_room;
                // console.log(response.data);
            });
        },
        methods: {
            updateStudent() {
                let uri = `/api/student/update/${this.$route.params.id}`;
                this.axios.post(uri, this.student).then((response) => {
                    this.$router.push({name: 'home'});
                });
            }
        }
    }
</script>