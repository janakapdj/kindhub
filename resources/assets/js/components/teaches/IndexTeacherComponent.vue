<template>
    <div>
        <h3>Teacher's list</h3>
        <div class="row">
            <div class="col-md-10"></div>
            <div class="col-md-2">
                <router-link :to="{ name: 'create_teacher' }" class="btn btn-primary">Create teacher</router-link>
            </div>
        </div><br />

        <table class="table table-hover">
            <thead>
            <tr>
                <th>ID</th>
                <th>Teacher Name</th>
            </tr>
            </thead>
            <tbody>
            <tr v-for="theacher in teachers" :key="theacher.id">
                <td>{{ theacher.id }}</td>
                <td>{{ theacher.teacher_name }}</td>
                <td><router-link :to="{name: 'edit_teacher', params: { id: theacher.id }}" class="btn btn-primary">Edit</router-link></td>
                <td><button class="btn btn-danger" @click.prevent="deleteTeacher(theacher.id)">Delete</button></td>
            </tr>
            </tbody>
        </table>
    </div>
</template>

<script>
    export default {
        data() {
            return {
                teachers: []
            }
        },
        created() {
            let uri = '/api/teachers';
            this.axios.get(uri).then(response => {
                this.teachers = response.data;
            });
        },
        methods: {
            deleteTeacher(id)
            {
                let uri = `/api/teacher/delete/${id}`;
                this.axios.delete(uri).then(response => {
                    this.$router.go(this.$router.teachers);
                });
            }
        }
    }
</script>