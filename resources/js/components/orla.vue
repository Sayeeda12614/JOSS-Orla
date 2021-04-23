<template>
  <div class="container-fluid">

    <div class="m-2">

      <div>
        <select v-model="CicloSeleccionado" @change="ciclo" id="ciclos">
          <option v-for="ciclo in arrayCiclos" v-bind:value="ciclo.id" :key="ciclo.id">
            {{ ciclo.nombre }}
          </option>
        </select>

        <select v-model="CursoSeleccionado" @change="curso" id="cursos">
          <option v-for="curso in arrayCursos" v-bind:value="curso.id" :key="curso.id">
            {{ curso.anio }}
          </option>
        </select>
      </div>

      <div class="orla mt-2" style="background-color:grey;">

        <div class="">
          <h1 class="">{{ CicloRecogido }}</h1>
          <h2 class="">{{ CursoRecogido }}</h2>
        </div>

        <main class="">
          <div class="" v-for="integrante in mostrarOrla" :key="integrante.id">
            <div class="profesores" v-if="integrante.tipo === 'profesor'" style="background-color: red">
              <img class="" style="height: 10rem" alt="foto" v-bind:src=" integrante.foto != null && integrante.foto !== ''? 'assets/Fotos_integrantes/' + integrante.foto: 'assets/Fotos_integrantes/placeholder.png'"/>
              <div class="">
                <h4 class="">{{ integrante.nombre }}</h4>
                <h5 class="">{{ integrante.apellidos }}</h5>
              </div>
            </div>

            <div class="alumnos" v-if="integrante.tipo === 'alumno'">
              <img class="" style="height: 10rem" alt="foto" v-bind:src=" integrante.foto != null && integrante.foto !== ''? 'assets/Fotos_integrantes/' + integrante.foto: 'assets/Fotos_integrantes/placeholder.png'"/>
              <div class="">
                <h4 class="">{{ integrante.nombre }}</h4>
                <h5 class="">{{ integrante.apellidos }}</h5>
              </div>
            </div>
          </div>
        </main>

        <a href="#" class="">CIFP Txurdinaga</a>

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
      CursoRecogido: "Ningun Curso seleccionado",
    };
  },
  methods: {
    cargarIntegrantes() {
      let me = this;
      let url = "api/integrantes";
      window.axios.get(url).then(function (response) {
        me.arrayIntegrantes = response.data;
        me.mostrarOrla = response.data;
      });
    },
    cargarCiclos() {
      let me = this;
      let url = "api/ciclos";
      window.axios.get(url).then(function (response) {
        me.arrayCiclos = response.data;
        console.log(arrayCiclos);
      });
    },
    cargarCursos() {
      let me = this;
      let url = "api/cursos";
      window.axios.get(url).then(function (response) {
        me.arrayCursos = response.data;
        console.log(arrayCursos);
      });
    },
    orla() {
      if (this.CicloSeleccionado != "" && this.CursoSeleccionado != "") {
        console.log(
          "El curso seleccionado" +
            this.CursoSeleccionado +
            " y Ciclo " +
            this.CicloSeleccionado
        );
        this.mostrarOrla = this.arrayIntegrantes.filter(
          (integrante) =>
            integrante.ciclo.id === this.CicloSeleccionado &&
            integrante.ciclo.id === this.CicloSeleccionado
        );
      } else {
        console.log(
          "No hay nada seleccionada" +
            this.CicloSeleccionado +
            " y " +
            this.CursoSeleccionado
        );
      }
    },
    ciclo() {
      var combo = document.getElementById("ciclos");
      var selected = combo.options[combo.selectedIndex].text;
      this.CicloRecogido = selected;
    },
    curso() {
      var combo = document.getElementById("cursos");
      var selected = combo.options[combo.selectedIndex].text;
      this.CursoRecogido = selected;
    },
  },
  watch: {
    CursoSeleccionado: function () {
      if (this.CursoSeleccionado != "") {
        console.log("curso id: " + this.CursoSeleccionado);
        this.mostrarOrla = this.arrayIntegrantes.filter(
          (integrante) => integrante.curso.id === this.CursoSeleccionado
        );
      } else {
        console.log("No hay curso seleccionado");
      }
    },
    CicloSeleccionado: function () {
      if (this.CicloSeleccionado != "") {
        console.log("ciclo id: " + this.CicloSeleccionado);
        this.mostrarOrla = this.arrayIntegrantes.filter(
          (integrante) => integrante.ciclo.id === this.CicloSeleccionado
        );
      } else {
        console.log("No hay ciclo seleccionado");
      }
    },
  },
  mounted() {
    this.cargarIntegrantes();
    this.cargarCiclos();
    this.cargarCursos();
    this.orla();
  },
};
</script>

<style>
.orla {
  display: flex;
  flex-direction: column;
}
</style>
