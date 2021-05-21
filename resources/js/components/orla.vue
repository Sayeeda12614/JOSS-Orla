<template>
  <div class="container-fluid">

    <div class="m-2">

      <div class="d-flex justify-content-between cabecera rounded">
        <section class="m-2">
          <select v-model="CicloSeleccionado" @change="ciclo" id="ciclos" class="rounded">
            <option v-for="ciclo in arrayCiclos" v-bind:value="ciclo.id" :key="ciclo.id">
              {{ ciclo.nombre }}
            </option>
          </select>

          <select v-model="CursoSeleccionado" @change="curso" id="cursos" class="rounded">
            <option v-for="curso in arrayCursos" v-bind:value="curso.id" :key="curso.id">
              {{ curso.anio }}
            </option>
          </select>
        </section>
        <button class="btn rounded-circle m-2 btn-warning" onclick="window.print()"><i class="fa fa-print" aria-hidden="true"></i></button>
      </div>

      <div class="LaOrla mt-2 text-center" style="background-color:#d65409c9ed;">
        <div class="">
          <h2 class="">{{ CicloRecogido }}</h2>
          <h3 class="">{{ CursoRecogido }}</h3>
        </div>
          <div class="container">
            <div class="row">
              <div class="col-12">
                <div class="row">
                  <div class="" v-for="integrante in mostrarOrla" :key="integrante.id">
                      <div v-if="integrante.tipo === 'profesor'" class="text-center p-2">
                        <img class="" alt="foto" style="height:5rem; border-radius:50%;" v-bind:src=" integrante.foto != null && integrante.foto !== ''? 'assets/Fotos_integrantes/' + integrante.foto: 'assets/Fotos_integrantes/placeholder.png'"/>
                        <div class="">
                          <p class="">{{ integrante.nombre }} {{ integrante.apellidos }}</p>
                        </div>
                      </div>
                  </div>
                </div>
              </div>
              <div class="col-12">
                <div class="row">
                  <div class="" v-for="integrante in mostrarOrla" :key="integrante.id">
                      <div v-if="integrante.tipo === 'alumno'" class="text-center p-2">
                        <img class="" alt="foto" style="height:5rem; border-radius:50%;" v-bind:src=" integrante.foto != null && integrante.foto !== ''? 'assets/Fotos_integrantes/' + integrante.foto: 'assets/Fotos_integrantes/placeholder.png'"/>
                        <div class="">
                          <p class="">{{ integrante.nombre }} {{ integrante.apellidos }}</p>
                        </div>
                      </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        <a href="#" class="" style="position:absolute; bottom:0;">CIFP Txurdinaga</a>
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
      });
    },
    cargarCursos() {
      let me = this;
      let url = "api/cursos";
      window.axios.get(url).then(function (response) {
        me.arrayCursos = response.data;
      });
    },
    orla() {
      if (this.CicloSeleccionado != "" && this.CursoSeleccionado != "") {
        this.mostrarOrla = this.arrayIntegrantes.filter(
          (integrante) =>
            integrante.ciclo.id === this.CicloSeleccionado &&
            integrante.curso.id === this.CursoSeleccionado
        );
      }else {
        console.log("No hay nada seleccionada, ciclo:"+this.CicloSeleccionado+" y curso:" +this.CursoSeleccionado);
        // for (let i = 0; i < this.arrayCursos.length; i++) {
        //   var element = this.arrayCursos[i];
        //   this.CursoSeleccionado = element;
        //   console.log("actual curso "+this.CursoSeleccionado);
        // }
        // this.CursoSeleccionado = 1;
        // this.CicloSeleccionado = 1;
        // this.mostrarOrla = this.arrayIntegrantes.filter(
        //   (integrante) =>
        //     integrante.ciclo.id === this.CicloSeleccionado &&
        //     integrante.curso.id === this.CursoSeleccionado
        // );
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
      // if (this.CursoSeleccionado != "") {
      //   console.log("curso id: " + this.CursoSeleccionado);
      //   this.mostrarOrla = this.arrayIntegrantes.filter(
      //     (integrante) => integrante.curso.id === this.CursoSeleccionado
      //   );
      // }
      if (this.CicloSeleccionado != "" && this.CursoSeleccionado != "") {
        this.mostrarOrla = this.arrayIntegrantes.filter(
          (integrante) =>
            integrante.ciclo.id === this.CicloSeleccionado &&
            integrante.curso.id === this.CursoSeleccionado
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
.cabecera {
  background-color: rgba(15, 15, 15, 0.596);
}

select {
  background-color: white;
}
.select-selected {
  background-color: DodgerBlue;
}
.col-xs-1-10 {
  /* position: relative; */
  min-height: 1px;
}

.col-xs-1-10 {
  width: 10%;
  float: left;
}
@media print{
  @page {
    size: landscape
  }
  body * {
      visibility: hidden;
      margin:0; padding:0;
   }
   .LaOrla * { 
      visibility: visible;
   }
   .LaOrla { 
      background-color: white;
   }
}
</style>
