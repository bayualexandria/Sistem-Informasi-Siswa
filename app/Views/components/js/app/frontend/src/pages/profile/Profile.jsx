import React from "react";
import { Link } from "react-router-dom";
import Taskbar from "../../../components/TaskBar/Taskbar";
import Watermark from "../../../components/Watermark";

function Profile() {
  return (
    <div>
      <Watermark />

      <div className="absolute w-full px-10 pt-10 pb-20 h-full">
        <div className="relative w-full rounded-lg shadow-md  bg-primary/80 px-10 py-20 h-full text-white">
          <div className="absolute top-3 right-3">
            <Link
              to="/"
              className="w-5 h-5 rounded-full shadow-md flex justify-center items-center bg-light-primary text-white hover:ring hover:ring-light-primary hover:bg-white hover:text-light-primary transition duration-200"
            >
              <p className="font-bold text-sm">x</p>
            </Link>
          </div>
          Lorem ipsum dolor sit amet consectetur adipisicing elit. Doloribus
          aliquid inventore neque, repudiandae cum odit saepe id dignissimos
          doloremque eos autem quasi ipsa sed impedit temporibus totam
          praesentium iure. Recusandae iusto illum quasi doloribus aspernatur
          nemo cupiditate reprehenderit placeat et nostrum corporis, vel illo,
          nesciunt maiores, fuga qui eius atque optio provident deserunt maxime!
          Voluptas laudantium nobis necessitatibus sint doloribus reiciendis ab
          possimus voluptatem ipsa eligendi vitae, magnam ipsam aut, quos fuga
          corporis, inventore tempore error laboriosam culpa odio earum. Et
          reprehenderit dolorem quod sapiente perspiciatis aliquam
          exercitationem culpa autem enim neque, eius, ratione, doloribus
          dignissimos laudantium tempora debitis rem!
        </div>
      </div>

      <Taskbar></Taskbar>
    </div>
  );
}

export default Profile;
