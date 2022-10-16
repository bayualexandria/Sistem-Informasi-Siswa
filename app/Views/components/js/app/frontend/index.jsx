import React, { useState } from "react";
import ReactDOM from "react-dom";
import App from "./src/App";

if (document.getElementById("frontend")) {
  const item = document.getElementById("frontend");
  ReactDOM.render(<App />, item);
}
