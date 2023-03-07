import React, { useState, useEffect } from "react";
import Taskbar from "../../../components/TaskBar/Taskbar";
import Watermark from "../../../components/Watermark";
import { Link } from "react-router-dom";
import Cookies from "js-cookie";
import axios from "axios";

function Mapel() {
  const [mapel, setMapel] = useState([]);

  const getMapel = async () => {
    let authentication = Cookies.get("authentication");
    const auth = authentication.split(",");
    try {
      let response = await axios
        .get(`/api/mapel/1`, {
          headers: {
            "Content-Type": "application/json",
            Authorization: "4lex@ndr!413 " + auth[0],
          },
        })
        .then((res) => res.data);
      setMapel(response.data);
    } catch (error) {}
  };
  useEffect(() => {
    getMapel();
  }, []);
  return (
    <div>
      <Watermark />
      <div className="absolute w-full md:px-10 md:pt-5 md:pb-20 p-2 h-full">
        <div className="relative w-full rounded-lg shadow-md  bg-slate-100/50 px-2 py-10 md:px-5 md:py-20 h-full text-white">
          <div className="absolute top-1 right-1 md:top-3 md:right-3">
            <Link
              to="/"
              className="w-5 h-5 rounded-full shadow-md flex justify-center items-center bg-light-primary text-white hover:ring hover:ring-light-primary hover:bg-white hover:text-light-primary transition duration-200"
            >
              <p className="font-bold text-sm">x</p>
            </Link>
          </div>
          {mapel.map((m) => {
            return <div key={m.id}>{m.nama_mapel}</div>;
          })}
        </div>
      </div>
      <Taskbar />
    </div>
  );
}

export default Mapel;
