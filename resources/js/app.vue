<template>
        <div class="wrapper">
             <!--Header -->
            <app-header  />
            <!--Ednd Header -->
            <app-sidebar />
            <!-- Sidebar -->
        
            <!-- End Sidebar -->
            <div class="main-panel">
                <router-view></router-view>
            </div>
         </div>
</template>
<script>
    // import { mapState, mapGetters } from 'vuex'
    import Header from './components/layouts/Header.vue'
    import Sidebar from './components/layouts/Sidebar.vue'
    // import Footer from './components/Footer.vue'
    export default {
        // computed: {
        //     ...mapState(['token']),
        //     ...mapGetters(['isAuth'])
        // },
        components: {
            'app-header': Header,
            'app-sidebar': Sidebar
        }
    }
</script>