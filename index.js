import express from "express";
import bodyParser from "body-parser";

const app = express();

var isVerified = false;
app.use(express.static("public"));
app.use(bodyParser.urlencoded({extended:true}));

function verification(req,res,next)
{
    const usr = req.body["username"];
    const pass = req.body["password"];
    if (usr==="sikander" && pass==="secret")
        {
         isVerified = true;
        }
        next();
}


app.get("/",(req,res)=>{
    res.render("index.ejs");
});

app.get("/login",(req,res)=>{
    res.render("login.ejs");
})
app.use(verification);

app.post("/dashboard",(req,res)=>{
    if (isVerified)
        {
            res.render("dashboard.ejs");
        }
        else
        {
            res.render("login.ejs");
        }
    });

app.get("/register",(req,res)=>{
    res.render("register.ejs");
})



app.listen(3000,()=>{console.log('Server started');});