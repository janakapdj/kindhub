<template>
    <div class="container">
        <div class="row">
            <nav class="navbar navbar-default">
                <ul class="nav navbar-nav">
                    <li class="nav-item">
                        <router-link to="/" class="nav-link">Home</router-link>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Teaches
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <router-link to="/teachers" class="nav-link">Teachers</router-link>
                            <br/>
                            <router-link to="/create_teacher" class="nav-link">Create Teacher</router-link>
                        </div>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown2" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Class Rooms
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <router-link to="/class_rooms" class="nav-link">Class Rooms</router-link>
                            <br/>
                            <router-link to="/create_class_room" class="nav-link">Create Class Room</router-link>
                        </div>
                    </li>
                    <li class="nav-item">
                        <router-link to="/create_student" class="nav-link">Create Student</router-link>
                    </li>
                </ul>
            </nav>
        </div>
        <div class="row">
            <div class="col-md-8">
                <transition name="fade">
                    <router-view></router-view>
                </transition>
            </div>
        </div>
    </div>
</template>

<style>
    .fade-enter-active, .fade-leave-active {
        transition: opacity .5s
    }

    .fade-enter, .fade-leave-active {
        opacity: 0
    }
</style>

<script>
    export default {}
</script>