import React from "react";

function Upload({ imageProfile, ...rest }) {
  return (
    <div className="flex flex-col gap-y-3 md:flex-row md:gap-x-3">
      <input
        type="file"
        {...rest}
        className="file:rounded-full file:bg-white file:border file:border-sky-200 file:text-primary file:text-sm file:font-bold"
      />
      {imageProfile && (
        <img src={imageProfile} className="md:w-1/4 w-1/2 rounded-md" />
      )}
    </div>
  );
}

export default Upload;
