const mongoose = require("mongoose");

//Esquema de la colleción en Mongo
const Schema = mongoose.Schema;

const CancionSchema = Schema({
    titulo: {
        type: String,
        require: true
    },
    grupoMusical: {
        type: String,
        require: false
    },
    duracion: {
        type: Number,
        require: false,
    },
    anio: {
        type: Number,
        require: false
    },
    genero: {
        type: String,
        require: false,
    },
    puntuacion: {
        type: Number,
        require: false
    },
});

module.exports = mongoose.model("Cancion", CancionSchema);