<template>
    <div>
        <h3>Class list</h3>
        <div class="row">
            <div class="col-md-10"></div>
            <div class="col-md-2">
                <router-link :to="{ name: 'create_class_room' }" class="btn btn-primary">Create Class</router-link>
            </div>
        </div><br />

        <table class="table table-hover">
            <thead>
            <tr>
                <th>ID</th>
                <th>Class Name</th>
                <th>Teacher Name</th>
            </tr>
            </thead>
            <tbody>
            <tr v-for="class_room in class_rooms" :key="class_room.id">
                <td>{{ class_room.id }}</td>
                <td>{{ class_room.class_name }}</td>
                <td>{{ class_room.teacher.teacher_name }}</td>
                <td><router-link :to="{name: 'edit_class_room', params: { id: class_room.id }}" class="btn btn-primary">Edit</router-link></td>
                <td><button class="btn btn-danger" @click.prevent="deleteClassRoom(class_room.id)">Delete</button></td>
            </tr>
            </tbody>
        </table>
    </div>
</template>

<script>
    export default {
        data() {
            return {
                class_rooms: []
            }
        },
        created() {
            let uri = '/api/class_rooms';
            this.axios.get(uri).then(response => {
                this.class_rooms = response.data;
            });
        },
        methods: {
            deleteClassRoom(id)
            {
                let uri = `/api/class_room/delete/${id}`;
                this.axios.delete(uri).then(response => {
                    this.$router.go(this.$router.class_rooms);
                });
            }
        }
    }
</script>