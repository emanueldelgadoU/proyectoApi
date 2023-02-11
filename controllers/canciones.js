const { restart } = require("nodemon");
const Cancion = require("../models/canciones");

//Función para insertar cancion en MongoDB
async function createCancion(req, res) {
    const cancion = new Cancion();
    const params = req.body; //Lo que enviamos por POST

    cancion.titulo = params.titulo; //campos del Json puesto en insomnia
    cancion.grupoMusical = params.grupoMusical; 
    cancion.duracion = params.duracion; 
    cancion.anio = params.anio; 
    cancion.genero = params.genero; 
    cancion.puntuacion = params.puntuacion; 

    try {
        //Insertar en MongoDB
        const cancionStore = await cancion.save();

        if (!cancionStore) {
            res.status(400).send({ msg: "Cancion no guardada correctamente"});
        } else {
            res.status(200).send({ Cancion: cancionStore});
        }

    } catch(error) {
        res.status(500).send(error)
    }
}

//Función para sacar todas las canciones
async function getCanciones(req, res) {
    
    try {
        const cancion = await Cancion.find().sort({ anio: -1});

        if (!cancion) {
            res.status(400).send("Error al obtener canciones de Mongo");
        } else {
            res.status(200).send(cancion);
        }

    } catch(error) {
        res.status(500).send(error);
    }
}

//Función para sacar una cancion por id
async function getCancion(req, res) {
    const idCancion = req.params.id;

    try {
        const cancion = await Cancion.findById(idCancion);

        if(!cancion) {
            res.status(400).send({ msg: "No se ha encontrado esa cancion"});
        } else {
            res.status(200).send(cancion);
        }
        
    } catch(error) {
        res.status(500).send(error);
    }
   
}

//Función por genero
async function getCancionGenero(req, res) {
    const generoCancion = req.params.genero;

    try {
        const cancion = await Cancion.find({genero:generoCancion})

        if(!cancion) {
            res.status(400).send({ msg: "No se ha encontrado esa cancion"});
        } else {
            res.status(200).send(cancion);
        }
        
    } catch(error) {
        res.status(500).send(error);
    }
}


//Función por los 10 primeros
async function getCancionLimite10(req, res) {

    try {
        const cancion = await Cancion.find().sort({puntuacion:-1}).limit(10);

        if(!cancion) {
            res.status(400).send({ msg: "No se ha encontrado esa cancion"});
        } else {
            res.status(200).send(cancion);
        }
        
    } catch(error) {
        res.status(500).send(error);
    }
}

//Función para eliminar una cancion por id
async function deleteCancion(req, res) {
    const idCancion = req.params.id;

    try {
        //const task = await Task.deleteOne({ _id: idTask });
        const cancion = await Cancion.findByIdAndDelete(idCancion);

        if(!cancion) {
            res.status(400).send({ msg: "No se ha encontrado esa tarea para borrar"});
        } else {
            res.status(200).send({ msg: "Tarea borrada",
            cancion: cancion });
        }
        
    } catch(error) {
        res.status(500).send(error);
    }
   
}

//Modificar una cancion
async function updateCancion(req, res) {
    //Sacar el id de la url del endpoint
    const idCancion = req.params.id;

    //Sacar los cambios de la cancion en el body de la request
    const bodyJson = req.body;
    bodyJson.puntuacion;

    try {
        const cancion = await Cancion.findByIdAndUpdate(idCancion,{$inc: {puntuacion: bodyJson.puntuacion}});

        if(!cancion) {
            res.status(400).send({ msg: "No se ha encontrado esa cancion para modificar"});
        } else {
            res.status(200).send({ msg: "cancion modificada",
            cancion: cancion });
        }
        
    } catch(error) {
        res.status(500).send(error);
    }

}


module.exports = {
    createCancion, getCanciones, getCancion, deleteCancion, updateCancion, getCancionGenero, getCancionLimite10,
}