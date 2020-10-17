<template>
    <div>
       <h1>{{this.$attrs.user.name}}</h1>

       <div v-for="image in images" v-bind:key="image.id">
           <img :src="image.image" style="height:100px; width:100px" alt="">
       </div>
    </div>
</template>

<script>
export default {
    data() {
        return {
            images: {}
        }
    },
    mounted() {
        this.getUserImages();
    },
    methods: {
        getUserImages() {
            const url = '/api/images/' + this.$attrs.user.id;
            axios.get(url)
                .then((response)=>{
                    this.images = response.data.data
                })
                .catch(error=>{
                    console.log(error)
                })
        }
    }
}
</script>