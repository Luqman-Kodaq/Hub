<template>
<div>
    <h1>Hello Everyone!!!</h1>
    <p>This is the homepage</p>
</div>
</template>

<script>
    export default {
        data() {
            return {
                token: localStorage.getItem('token')
            }
        }
    }
</script>