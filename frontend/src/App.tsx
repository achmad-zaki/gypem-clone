import Logo from "./assets/react.svg";

function App() {
  return (
    <div className="bg-gray-50 min-h-screen flex items-center justify-center rounded-md">
      <div className="flex flex-col items-center">
        <div className="w-full max-w-sm bg-white border border-gray-300 p-10 rounded-md">
          <div className="flex flex-col items-center justify-center space-y-3">
            {/* image */}
            <img src={Logo} alt="React Logo" className="w-15 h-15 space-y-15" />

            {/* text */}
            <div className="space-y-1.5 text-center">
              <h3 className="text-2xl font-semibold space-y-30 ">Login Page</h3>
              <p className="text-lg">This is login page</p>
            </div>

            {/* form */}
            <div className="w-full space-y-3">
              <div className="space-y-1 px-2 flex flex-col">
                <label htmlFor="">Email</label>
                <input
                  placeholder="Enter Your Email"
                  className="border border-gray-400 px-4 py-1 rounded-md"
                  type="text"
                />
              </div>
              <div className="space-y-1 px-2 flex flex-col ">
                <label htmlFor="">Password</label>
                <input
                  placeholder="Enter Your Password"
                  className="border border-gray-400 px-4 py-1 rounded-md"
                  type="text"
                />
              </div>
            </div>
            <button className="mt-5 bg-indigo-500 px-6 py-1.5 text-white w-full rounded-md">
              Submit
            </button>
          </div>
          <div className="flex items-center justify-center gap-0">
            <p className="px-2 text-gray-300">Already have an account?</p>
            <p className="font-bold">Login</p>
          </div>
          <div className="flex items-center gap-3 w-full my-3">
            <div className="flex-1 border-t border-gray-200"></div>
            <span className="text-sm text-gray-400">or continue with</span>
            <div className="flex-1 border-t border-gray-200"></div>
          </div>
          <button className="w-full flex items-center justify-center gap-2 border border-gray-300 rounded-lg py-2 hover:bg-gray-50 transition">
            <img
              src="https://www.gstatic.com/firebasejs/ui/2.0.0/images/auth/google.svg"
              alt="Google Logo"
              className="w-4 h-4"
            />
            <span className="text-sm font-medium text-gray-800">
              Google account
            </span>
          </button>
        </div>
        <div className="w-full max-w-md px-2 mt-2">
          <p className="text-xs text-gray-400 text-center leading-relaxed">
            By clicking "Submit", you agree to ThinkGPT's{" "}
            <a href="#" className="text-gray-600 underline">
              User Agreement
            </a>
            , and{" "}
            <a href="#" className="text-gray-600 underline">
              Privacy Policy
            </a>
            , while we prioritize your privacy and trust, guiding you through
            innovative interactions while safeguarding your personal
            information.
          </p>
        </div>
      </div>
    </div>
  );
}

export default App;
