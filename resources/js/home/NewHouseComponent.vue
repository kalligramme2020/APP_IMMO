<template>
    <div class="container-fluid">
        <div class = "page-header text-center">
            <h1> Nouveau bien Bien</h1>
        </div>
        <div class="dropdown-divider"></div>
        <div class="jumbotron"><div class="text-right"> </div></div>

        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Informations generales</div>
                    <div class="card-body">
                            <div class="">
                                <div class="form-group col-md-6">
                                    <label for="label">Label:</label>
                                    <input type="text" id="label" class="form-control" v-model="name">
                                </div>

                                <div class="form-group col-md-4">
                                    <label for="tbien">Type du bien</label>
                                    <select class="form-control" id="tbien" v-model="TBien"  >
                                        <option value=""></option>
                                        <option v-for="typebien in typeBiens" :key="typebien.id"  v-bind:value="typebien.id"  >{{typebien.name}}</option>
                                    </select>
                                </div>
                            </div>
                    </div>

                    <div class="card-footer">Addresse</div>
                    <div class="card-body">
                        <div class="form-row">

                            <div class="form-group col-md-6">
                                <label for="address">Addresse:</label>
                                <input type="text" id="address" class="form-control" v-model="address" >
                            </div>
                            <div class="form-group col-md-6">
                                <label for="pays">Pays:</label>
                                <select  class="form-control" id="pays" v-model="pays">
                                    <option></option>
                                     <option v-for="country in countries" v-bind:value="country.id" >{{ country.pays }}</option>

                                </select>
                            </div>

                            <div class="form-group col-md-6">
                                <label for="ville">ville:</label>
                                <input type="text" id="ville" class="form-control" v-model="ville">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="region">region:</label>
                                <input type="text" id="region"  class="form-control" v-model="region">
                            </div>

                            <div class="form-group col-md-6">
                                <label for="Nporte">Numero porte:</label>
                                <input type="text" id="Nporte" class="form-control" v-model="numeroPorte">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="cp">Code postal:</label>
                                <input type="text" id="cp" class="form-control" v-model="codeP">
                            </div>

                        </div>

                    </div>

                    <div class=" card-header">Options au choix</div>

                    <div class="card-body">
                        <div class="form-row">
                            <div class="form-group col-md-2">
                                <label for="cam">chambre</label>
                                <input type="number" id="cam" class="form-control" v-model="chambre">
                            </div>
                            <div class="form-group col-md-2">
                                <label for="studio">studio</label>
                                <input type="number" id="studio" class="form-control" v-model="studio">
                            </div>
                            <div class="form-group col-md-2">
                                <label for="bt">boutique</label>
                                <input type="number" id="bt" class="form-control" v-model="boutique">
                            </div>
                            <div class="form-group col-md-2">
                                <label for="salon">salon</label>
                                <input type="number" id="salon" class="form-control" v-model="salon">
                            </div>
                            <div class="form-group col-md-2">
                                <label for="sb">salle de bain</label>
                                <input type="number" id="sb" class="form-control" v-model="bain">
                            </div>
                            <div class="form-group col-md-2">
                                <label for="pk">parking</label>
                                <input type="number" id="pk" class="form-control" v-model="parking">
                            </div>
                            <div class="form-group col-md-2">
                                <label for="app">appartemen</label>
                                <input type="number" id="app" class="form-control" v-model="appart">
                            </div>
                            <div class="form-group col-md-2">
                                <label for="ter">terasse</label>
                                <input type="number" id="ter" class="form-control" v-model="terrasse">
                            </div>
                            <div class="form-group col-md-2">
                                <label for="sf">salle de fette</label>
                                <input type="number" id="sf" class="form-control" v-model="banquet">
                            </div>

                        </div>
                    </div>

                    <div class=" card-header">Descriptions</div>

                    <div class="card-body">
                        <div>
                            <div class="form-group col-md-6">
                                <label for="sur">Surface en M²:</label>
                                <input type="number" id="sur" class="form-control" v-model="surface">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="des">decription:</label>
                                <textarea class="form-control" id="des" v-model="description"></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <button type="button" class="btn btn-success" @click="addbien">enrgistrer</button>
                        <router-link to="/home" class="btn btn-danger" >annuler</router-link>
                    </div>
                </div>

            </div>
        </div>
    </div>
</template>

<script>
    export default {
        name: "NewHouseComponent",

        mounted() {
              // console.log(this.typeBiens.id)
        },

        data(){
            return{
                // params de d'ajout
                name:'', banquet:'',
                pays:'', terrasse:'',
                ville:'', appart:'',
                numeroPorte:'', parking:'',
                region:'', bain:'',
                address:'', codeP:'',
                surface:'', TBien:"",
                chambre:'',
                boutique:'', studio:'',
                description:'',salon:'',

                countries:'', typeBiens:'', //reception des elts a modifier
            }
        },
        //reception pays et liste
        created() {
           axios.get('api/pays')
            .then((response )=> {
                this.countries= response.data.land
                this.typeBiens= response.data.peol
                // console.log( this.country, this.typeBiens)
            });
        },

        methods:{
            //ajout d'un bien____
            addbien(){
                axios.post('api/house', {
                    appellation:this.name,
                    typeB:this.TBien,
                    ville:this.ville,
                    region:this.region,
                    pays:this.pays,
                    addresse:this.address,
                    codeP:this.numeroPorte,
                    area:this.surface,
                    description:this.description,
                    chambre:this.chambre,
                    cuisine:this.cuisine,
                    salon:this.salon,
                    bain:this.bain,
                    studio:this.studio,
                    appartement:this.appart,
                    banquet:this.banquet,
                    terrase:this.terrasse,
                    parking:this.parking,
                })
                .then(function (response) {
                    // console.log(response);
                })
                .then(
                    this.description = '',this.name = '', this.TBien ='', this.ville = '',this.region = "",this.pays='',this.address, this.surface ='',this.chambre = '',
                    this.cuisine = '',this.salon="",this.bain='',this.studio ='',this.appart = '',this.banquet ='', this.parking = '',
                )
                .catch(function (error) {
                    // console.log(error);
                });
            }

        }
    }
</script>

<style scoped>

</style>
