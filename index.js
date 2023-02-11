const mongoose = require("mongoose");
const app = require("./app");
const port = 3000;
const urlMongo = "mongodb+srv://emyfoorlife:arj1rf9zNoi0UsAa@cluster0.vtr8evs.mongodb.net/test";
//const urlMongo = "mongodb://root:toor@localhost:27017/";

mongoose.set('strictQuery', false);

mongoose.connect(urlMongo, (err, res) => {
  try {
    if (err) {
      throw err;
    } else {
      console.log("Conectado a Mongo, ok.")

      //Servidor web de Node.js
      app.listen(port, () => {
        console.log(`Example app listening on port ${port}`)
      })
    }
  } catch(err) {
    console.error(err);
  }
});






