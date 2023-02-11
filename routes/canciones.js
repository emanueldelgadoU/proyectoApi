const express = require("express");
const CancionController = require("../controllers/canciones")
const api = express.Router();

//Middleware
const md_auth = require("../middleware/authenticated");

//Endpoints ----------------

//Crear cancion
api.post("/cancion", CancionController.createCancion);

//Consultar todas las canciones
api.get("/cancion", CancionController.getCanciones);

//Consultar una cancion
api.get("/cancion/:id", [md_auth.ensureAuth], CancionController.getCancion);

//Consultar una cancion por genero
api.get("/cancion/gener/:genero", [md_auth.ensureAuth], CancionController.getCancionGenero);

//Consultar una cancion por genero
api.get("/cancion/musica/limite10",[md_auth.ensureAuth], CancionController.getCancionLimite10);

//Borrar cancion por id
api.delete("/cancion/:id", [md_auth.ensureAuth], CancionController.deleteCancion);

//Modificar cancion por id
api.put("/cancion/updateCancion/:id", CancionController.updateCancion);

module.exports = api;