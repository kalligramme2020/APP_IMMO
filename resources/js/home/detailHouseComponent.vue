<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8" v-if="!loading">
                <div class="card">
                    <div class="card-header"> <h2>detail sur le bien: <span class="font-weight-bold">{{ details.appellation}}</span></h2>  </div>

                    <div class="card-body">
                        <h4>type: <span class="">{{ details.tbien.name}}</span></h4>
                        <h4>adresse: <span class="">{{details.addresse}}</span></h4>
                        <p>surface: <span>{{details.surface}}</span> m²</p>
                        <p>chambre:</p>
                        <p>salon:</p>
                        <p>salle de bain:</p>
                        <p>cuisine:</p>
                        <p>description:</p>
                        <p>statut:</p>
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-group col-md-2">
                        <router-link to="/home" class=" btn btn-success">Retour</router-link>
                    </div>
                    <div class="form-group col-md-4" v-if = "this.details.tbien.name === 'himeuble' ">
                        <router-link to="/new-house" class=" btn btn-primary">Ajouter un sous bien </router-link>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        name: "detailHouseComponent",

        mounted() {

            this.details = this.$route.params.detail
            console.log(this.details);
            this.loading = false;
        },

        data(){
          return{
              loading: true,
              details: null,
          }
        },

        // created() {
        //     axios.get('api/house/' + this.$route.params.detail)
        //     .then((response )=>{
        //        console.log(response.data)
        //     });
        // }
    }
</script>

<style scoped>

</style>
