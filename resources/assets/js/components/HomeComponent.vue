<template>
    <div>
        <h3>Students's list</h3>
        <div class="row">
            <div class="col-md-10"></div>
            <div class="col-md-2">
                <router-link :to="{ name: 'create_student' }" class="btn btn-primary">Create student</router-link>
            </div>
        </div><br />

        <table class="table table-hover">
            <thead>
            <tr>
                <th>ID</th>
                <th>Student name</th>
                <th>Class name</th>
                <th>Teacher name</th>
                <th>Gender</th>
                <th>Joined year</th>
            </tr>
            </thead>
            <tbody>
            <tr v-for="student in students" :key="student.id">
                <td>{{ student.id }}</td>
                <td>{{ student.first_name}} {{ student.last_name}}</td>
                <td>{{ student.class_room.class_name}}</td>
                <td>{{ student.class_room.teacher.teacher_name}}</td>
                <td>{{ student.gender}}</td>
                <td>{{ student.join_year}}</td>
                <td><router-link :to="{name: 'edit_student', params: { id: student.id }}" class="btn btn-primary">Edit</router-link></td>
                <td><button class="btn btn-danger" @click.prevent="deleteStudent(student.id)">Delete</button></td>
            </tr>
            </tbody>
        </table>
    </div>
</template>

<script>
    export default {
        data(){
            return {
                students:{}
            }
        },
        created() {
            let uri = '/api/home';
            this.axios.get(uri).then(response => {
                this.students = response.data;
            });
        },
        methods: {
            deleteStudent(id)
            {
                let uri = `/api/student/delete/${id}`;
                this.axios.delete(uri).then(response => {
                    this.$router.go(this.$router.home);
                });
            }
        }
    }
</script>