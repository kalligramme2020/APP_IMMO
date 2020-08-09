<template>
    <div class="container-fluid">
        <router-view></router-view>
        <div class = "page-header">
            <h1> Biens</h1>
        </div>
        <div class="dropdown-divider"></div>
        <div class="jumbotron">
            <div class="text-right">
                <router-link to="/new-house" class="btn btn-outline-secondary">Nouveau bien</router-link>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Example Component</div>

                    <div class="card-body">
                        <table class="table table-bordered">
                            <thead class=" text-center">
                            <tr>
                                <th scope="col">Nom</th>
                                <th scope="col">type du bien</th>
                                <th scope="col">Locataire</th>
                                <th scope="col"> action </th>
                            </tr>
                            </thead>
                            <tbody v-for=" bien in biens" v-bind:key="bien.id">
                            <tr>
                                <td> <router-link :to="{ name: 'details', params: {detail: bien }}">{{bien.appellation}} <span style="font-size: 10px">{{bien.addresse}}</span> </router-link>
                                     </td>
                                <td>{{bien.tbien.name}}</td>
                                <td></td>
                                <th class="text-center">
                                    <div class="btn-group">
                                        <button class="btn btn-secondary btn-sm dropdown-toggle " type="button" data-toggle="dropdown" aria-expanded="false">
                                            actions
                                        </button>
                                        <div class="dropdown-menu">
                                            <router-link :to="{ name: 'edit', params: {edithouse_id: bien } }" class="dropdown-item"><i class="fas fa-edit fa-sm"> </i> modifier</router-link>
                                            <button class="dropdown-item"  @click="deletedBien(bien.id)"> <i class="fas fa-trash-alt fa-sm"></i> suprimer </button>
                                            <div class="dropdown-divider"></div>
                                            <a class="dropdown-item" href="#">Autres</a>
                                        </div>
                                    </div>
                                </th>
                            </tr>
                            </tbody>
                        </table>
                    </div>

                    <div class="card-footer"></div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        name: "HomeComponent",

        data(){
          return{
              biens:'',
          }
        },
        //liste des bien
        created() {
            axios.get('api/house')
            .then((response) => {
                this.biens = response.data
            // console.log(response.data);
            });
        },
        //supression de bien
        methods:{
          deletedBien(id){
            axios.delete('api/house/' + id)
            .then((response)=>{
                // console.log(response.data)
            })
          },
        },
    }
</script>

<style scoped>

</style>
