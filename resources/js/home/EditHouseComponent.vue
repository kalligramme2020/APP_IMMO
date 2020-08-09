<template>
    <div class="container-fluid">
        <div class = "page-header text-center">
            <h1>modifier</h1>
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
                                <input type="text" id="label" class="form-control" v-model="this.houseId.appellation">
                            </div>

                            <div class="form-group col-md-4">
                                <label for="tbien">Type du bien</label>
                                <select class="form-control" id="tbien" v-model=" this.houseId.tbien.name ">
                                    <option value=""></option>
                                    <option v-for="typebien in typeBiens" :key="typebien.id"  v-bind:value="typebien.id">{{typebien.name}}</option>
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="card-footer">Addresse</div>
                    <div class="card-body">
                        <div class="form-row">

                            <div class="form-group col-md-6">
                                <label for="address">Addresse:</label>
                                <input type="text" id="address" class="form-control" v-model="this.houseId.address" >
                            </div>
                            <div class="form-group col-md-6">
                                <label for="pays">Pays:</label>
                                <select  class="form-control" id="pays" v-model="this.houseId.pays">
                                    <option></option>
                                    <option v-for="country in countries" v-bind:value="country.id" >{{ country.pays }}</option>
                                </select>
                            </div>

                            <div class="form-group col-md-6">
                                <label for="ville">ville:</label>
                                <input type="text" id="ville" class="form-control" v-model="this.houseId.ville">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="region">region:</label>
                                <input type="text" id="region"  class="form-control" v-model="this.houseId.region">
                            </div>

                            <div class="form-group col-md-6">
                                <label for="Nporte">Numero porte:</label>
                                <input type="text" id="Nporte" class="form-control">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="cp">Code postal:</label>
                                <input type="text" id="cp" class="form-control">
                            </div>

                        </div>

                    </div>

                    <div class=" card-header">Options au choix</div>

                    <div class="card-body">
                        <div class="form-row">
                            <div class="form-group col-md-2">
                                <label for="cam">chambre</label>
                                <input type="number" id="cam" class="form-control">
                            </div>
                            <div class="form-group col-md-2">
                                <label for="studio">studio</label>
                                <input type="number" id="studio" class="form-control">
                            </div>
                            <div class="form-group col-md-2">
                                <label for="bt">boutique</label>
                                <input type="number" id="bt" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="salon" >salon </label>
                                <input type="number" id="salon" class="form-control">
                            </div>
                            <div class="form-group col-md-2">
                                <label for="sb">salle de bain</label>
                                <input type="number" id="sb" class="form-control">
                            </div>
                            <div class="form-group col-md-2">
                                <label for="pk">parking</label>
                                <input type="number" id="pk" class="form-control" >
                            </div>
                            <div class="form-group col-md-2">
                                <label for="app">appartemen</label>
                                <input type="number" id="app" class="form-control" >
                            </div>
                            <div class="form-group col-md-2">
                                <label for="ter">terasse</label>
                                <input type="number" id="ter" class="form-control" >
                            </div>
                            <div class="form-group col-md-2">
                                <label for="sf">salle de fette</label>
                                <input type="number" id="sf" class="form-control" >
                            </div>

                        </div>
                    </div>

                    <div class=" card-header">Descriptions</div>

                    <div class="card-body">
                        <div>
                            <div class="form-group col-md-6">
                                <label for="sur">Surface en M²:</label>
                                <input type="number" id="sur" class="form-control" v-model="this.houseId.surface">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="des">decription:</label>
                                <textarea class="form-control" id="des" v-model="this.houseId.description"></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <button type="button" class="btn btn-success" @click="editHouse" >modifier</button>
                        <router-link to="/home" class="btn btn-danger" >annuler</router-link>
                    </div>
                </div>

            </div>
        </div>
    </div>
</template>

<script>
    export default {
        name: "EditHouseComponent",

        mounted() {

            this.houseId = this.$route.params.edithouse_id //reception des elts a modifier
            console.log(this.houseId);
        },

        data(){
            return{

                countries:'',
                typeBiens:'',

                houseId:"",
            }
        },
        //liste des pays et tbien
        created() {
            axios.get('api/pays')
            .then((response )=> {
                this.countries= response.data.land
                this.typeBiens= response.data.peol
                // console.log( this.country, this.typeBiens)
            });
        },

        methods:{
            editHouse(){
                axios.patch('api/house/' + this.houseId.id, {
                    appellation:this.houseId.appellation,
                    typeB:this.TBien,
                    ville:this.this.houseId.ville,
                    region:this.this.houseId.region,
                    pays:this.pays,
                    addresse:this.this.houseId.address,
                    codeP:this.numeroPorte,
                    area:this.houseId.surface,
                    description:this.houseId.description,
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
                .then(
                    this.houseId.appellation = "", this.houseId.ville = "", this.houseId.surface="", this.houseId.description="",
                    this.houseId.region="",this.houseId.ville="", this.houseId.address="",
                )

            }
        }
    }
</script>

<style scoped>

</style>
