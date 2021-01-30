<template>
    <div class="d-flex justify-content-center">
       <p class="welcome-message">Welcome {{ fullName }}</p>
    </div>
   
</template>

<script>
    export default {
        data() {
           return {
                fullName:  this.$store.state.registration[0].firstName + ' ' +  this.$store.state.registration[0].lastName
           } 
        }
    }
</script>
