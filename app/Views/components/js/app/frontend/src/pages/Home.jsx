import React, { useState, useEffect } from "react";
import { Link } from "react-router-dom";
import Taskbar from "../../components/TaskBar/Taskbar";
import Watermark from "../../components/Watermark";

function Home() {
  return (
    <div>
      <Watermark />
      <Taskbar></Taskbar>
    </div>
  );
}

export default Home;
