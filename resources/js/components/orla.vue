<template>
  <div>
    La orla
    <div v-for="integrante in arrayIntegrantes" :key="integrante.id">
      <div>
        <h4>{{ integrante.nombre }}</h4>
        <h5>{{ integrante.apellidos }}</h5>
      </div>
    </div>
  </div>
</template>

<script>
Vue.config.productionTip = false;
export default {
  data() {
    return {
      arrayIntegrantes: []
    };
  },
  methods: {
    cargarIntegrantes() {
      let url = "api/integrantes";
      window.axios
        .get(url)
        .then(function (response) {
          this.arrayIntegrantes = response.data;
          console.log(arrayIntegrantes);
        })
        .catch(function (error) {
          console.log("Habido un error: " + error);
        });
    },
  },
  mounted(){
    this.cargarIntegrantes();
  }
};
</script>

<style>
</style>
