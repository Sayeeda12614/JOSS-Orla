<template>
  <div class="container-fluid">

    <div class="m-2">

      <div class="d-flex justify-content-between cabecera rounded">
        <section class="m-2">
          <select v-model="CicloSeleccionado" @change="ciclo" id="ciclos" class="rounded">
            <option value="" disabled>Selecciona un ciclo</option>
            <option v-for="ciclo in arrayCiclos" v-bind:value="ciclo.id" :key="ciclo.id">
              {{ ciclo.nombre }}
            </option>
          </select>

          <select v-model="CursoSeleccionado" @change="curso" id="cursos" class="rounded">
            <option value="" disabled>Selecciona un curso</option>
            <option v-for="curso in arrayCursos" v-bind:value="curso.id" :key="curso.id">
              {{ curso.anio }}
            </option>
          </select>
        </section>
        <button class="btn rounded-circle m-2 btn-warning" onclick="window.print()"><i class="fa fa-print" aria-hidden="true"></i></button>
      </div>

      <div class="LaOrla mt-2 text-center" style="background-color:#d65409c9ed;">
        <div class="">
          <h1 class="tituloTxurdi">CIFP Txurdinaga LHII</h1>
          <h2 class="subtituloOrla">{{ CicloRecogido }}</h2>
          <h3 class="subtituloOrla">{{ CursoRecogido }}</h3>
        </div>
        <marquee behavior="" direction=""><h1 id="ningunintegrante" class="m-5">ZORIONAK FINALISTAK / FELICIDADES FINALISTAS.</h1></marquee>
          <div class="container" id="integrantes">
            <div class="row">
              <div class="col-12" style="border-bottom: 5px outset #d65409;">
                <div class="row">
                  <div class="" v-for="integrante in mostrarOrla" :key="integrante.id">
                      <div v-if="integrante.tipo === 'profesor'" class="p-2" style="width:6rem;">
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
                      <div v-if="integrante.tipo === 'alumno'" class="p-2" style="width:6rem;">
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
          <p style="position:relative;"><i class="fa fa-copyright"></i> J.O.S.S Tech 2021</p>
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
      if (this.CicloSeleccionado == "" && this.CursoSeleccionado == ""){
        document.getElementById("integrantes").style.display = "none";
        document.getElementById("ningunintegrante").style.display = "block";
        console.log("nada");
      }
    },
    ciclo() {
      var combo = document.getElementById("ciclos");
      var selected = combo.options[combo.selectedIndex].text;
      this.CicloRecogido = selected;
      document.getElementById("integrantes").style.display = "block";
      document.getElementById("ningunintegrante").style.display = "none";
    },
    curso() {
      var combo = document.getElementById("cursos");
      var selected = combo.options[combo.selectedIndex].text;
      this.CursoRecogido = selected;
      document.getElementById("integrantes").style.display = "block";
      document.getElementById("ningunintegrante").style.display = "none";
    },
  },
  watch: {
    CicloSeleccionado: function () {
      if (this.CicloSeleccionado != "") {
        console.log("ciclo id: " + this.CicloSeleccionado);
       this.mostrarOrla = this.arrayIntegrantes.filter(
          (integrante) =>
            integrante.ciclo.id === this.CicloSeleccionado &&
            integrante.curso.id === this.CursoSeleccionado
        );
      } else {
        console.log("No hay ciclo seleccionado");
      }
    },
    CursoSeleccionado: function () {
      if (this.CicloSeleccionado) {
        console.log("curso id: " + this.CursoSeleccionado);
        this.mostrarOrla = this.arrayIntegrantes.filter(
          (integrante) =>
           integrante.curso.id === this.CursoSeleccionado &&
            integrante.ciclo.id === this.CicloSeleccionado 
        );
      } else {
        console.log("No hay curso seleccionado");
      }
    }
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
.row{
  justify-content: center;
}
select {
  background-color: white;
}
.select-selected {
  background-color: DodgerBlue;
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
      margin-top: 0 !important;
      padding-top: 0 !important;
      visibility: visible;
   }
}
</style>
