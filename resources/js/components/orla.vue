<template>
  <div>

    <div>
      <select v-model="CicloSeleccionado">
          <option v-for="ciclo in arrayCiclos" v-bind:value="ciclo.id" :key="ciclo.id">{{ ciclo.nombre }}</option>
      </select>
    </div>

    <div>
      <select v-model="CursoSeleccionado">
          <option v-for="curso in arrayCursos" v-bind:value="curso.id" :key="curso.id">{{ curso.anio }}</option>
      </select>
    </div>

      <div class="card" style="width: 100%;">
        <div class="card-body">
          <h1 class="card-title">{{ CicloRecogido }}</h1>
          <h2 class="card-subtitle mb-2 text-muted">{{ CursoRecogido }}</h2>
            <div class="card-text">

                <h2>Profesores</h2>
                <div class="bg-warning" v-for="integrante in mostrarOrla" :key="integrante.id">
                  <div v-if="integrante.tipo === 'profesor'">
                    <h4>{{ integrante.nombre }}</h4>
                    <h5>{{ integrante.apellidos }}</h5>
                  </div>
                </div>
                
                <h2>Alumnos</h2>
                <div class="bg-dark" v-for="integrante in mostrarOrla" :key="integrante.id">
                  <div v-if="integrante.tipo === 'alumno'">
                    <h4>{{ integrante.nombre }}</h4>
                    <h5>{{ integrante.apellidos }}</h5>
                  </div>
                </div>
                
            </div>
          <a href="#" class="card-link">CIFP Txurdinaga</a>
        </div>
      </div>
  </div>
</template>

<script>
Vue.config.productionTip = false;
export default {
  data() {
    return {
      arrayIntegrantes: [],
      mostrarOrla: [],
      arrayCiclos: [],
      arrayCursos: [],
      CicloSeleccionado: "",
      CicloRecogido: "Ningun Ciclo seleccionado",
      CursoSeleccionado: "",
      CursoRecogido: "Ningun Curso seleccionado"

    };
  },
  methods: {
    cargarIntegrantes() {
      let me = this;
      let url = "api/integrantes";
      window.axios
        .get(url)
        .then(function (response) {
          me.arrayIntegrantes = response.data;
          me.mostrarOrla = response.data;
        })
        .catch(function (error) {
          console.log("Habido un error: " + error);
        });
    },
    cargarCiclos() {
      let me = this;
      let url = "api/ciclos";
      window.axios
        .get(url)
        .then(function (response) {
          me.arrayCiclos = response.data;
          console.log(arrayCiclos);
        })
        .catch(function (error) {
          console.log("Habido un error: " + error);
        });
    },
    cargarCursos() {
      let me = this;
      let url = "api/cursos";
      window.axios
        .get(url)
        .then(function (response) {
          me.arrayCursos = response.data;
          console.log(arrayCursos);
        })
        .catch(function (error) {
          console.log("Habido un error: " + error);
        });
    },
    orla() {
      if(this.CicloSeleccionado!="" && this.CursoSeleccionado!="") {
        console.log("El curso seleccionado"+ this.CursoSeleccionado+" y Ciclo "+this.CicloSeleccionado);
        this.mostrarOrla = this.arrayIntegrantes.filter((integrante) =>
        integrante.ciclo.id===this.CicloSeleccionado && integrante.ciclo.id===this.CicloSeleccionado);
      }
      else{
        console.log("No hay nada seleccionada"+ this.CicloSeleccionado+ " y "+this.CursoSeleccionado);

      }
    }
  },
  watch: {
    CursoSeleccionado:function(){
      if(this.CursoSeleccionado !=""){
        console.log("curso id: "+ this.CursoSeleccionado);
        this.mostrarOrla = this.arrayIntegrantes.filter((integrante) =>
        integrante.curso.id === this.CursoSeleccionado);
      }
      else{
        console.log("No hay curso seleccionado");
      }
    }
    ,
    CicloSeleccionado:function(){
      if(this.CicloSeleccionado !=""){
        console.log("ciclo id: "+ this.CicloSeleccionado);
        this.mostrarOrla = this.arrayIntegrantes.filter((integrante) =>
        integrante.ciclo.id === this.CicloSeleccionado);
      }
      else{
        console.log("No hay ciclo seleccionado");
      }
    }
  },
  mounted(){
    this.cargarIntegrantes();
    this.cargarCiclos();
    this.cargarCursos();
  }
};
</script>

<style>
</style>
