import React from "react";
import Taskbar from "../../../components/TaskBar/Taskbar";
import Watermark from "../../../components/Watermark";
import { Link } from "react-router-dom";

function Mapel() {
  return (
    <div>
      <Watermark />
      <div className="absolute w-full md:px-10 md:pt-5 md:pb-20 p-2 h-full">
        <div className="relative w-full rounded-lg shadow-md  bg-primary/80 px-2 py-10 md:px-5 md:py-20 h-full text-white">
          <div className="absolute top-1 right-1 md:top-3 md:right-3">
            <Link
              to="/"
              className="w-5 h-5 rounded-full shadow-md flex justify-center items-center bg-light-primary text-white hover:ring hover:ring-light-primary hover:bg-white hover:text-light-primary transition duration-200"
            >
              <p className="font-bold text-sm">x</p>
            </Link>
          </div>
          
        </div>
      </div>
      <Taskbar />
    </div>
  );
}

export default Mapel;
