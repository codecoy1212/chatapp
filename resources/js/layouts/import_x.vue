<template lang="">
    
</template>
<script>
    import testData from "../services/testData";
export default {
    name: "app",
    mounted() {
        testData.getAll()
        .then((res) => {
        console.log(res);
        })
        .catch((e) => {
          console.log(e);
        });
  },
}
</script>
<style lang="">
    
</style>