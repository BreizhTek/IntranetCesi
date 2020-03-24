<html>
<head>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="ressources/js/upload.js"></script>
    <link rel="stylesheet" href="../../style.css">
    <link rel="stylesheet" href="../autre/fontello/css/fontello.css">
    <link rel="stylesheet" href="ressources/css/depo.css">

</head>
<body class=" lg:overflow-visible min-h-screen flex flex-col">

<!------------------------ ERROR MESSAGE---------------------------------->
<div  class="bg-teal-lightest border-t-4 border-teal rounded-b text-teal-darkest px-4 py-3 shadow-md my-2" >
    <div class="flex font-mono font-bold" id="message">
        <svg class="h-6 w-6 text-teal mr-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M2.93 17.07A10 10 0 1 1 17.07 2.93 10 10 0 0 1 2.93 17.07zm12.73-1.41A8 8 0 1 0 4.34 4.34a8 8 0 0 0 11.32 11.32zM9 11V9h2v6H9v-4zm0-6h2v2H9V5z"/></svg>
    </div>
</div>
<!------------------------FILE'S UPLOAD---------------------------------->





    <!-------------------------------------------------------------------->
    <div id="mainDiv" class="flex flex-col lg:flex-none bg-gray-300">
        <!-- File List -->
        <div  class="flex lg:w-4/5  justify-center lg:m-3 m-1 ">

            <div class="lg:m-2 lg:p-2 bg-white w-full border-1 rounded-lg shadow-lg" id="parentNode">

                <div class="flex flex-row w-full mb-3 border-black p-3 " id="parentList">

                    <div class="w-1/6 lg:w-1/12  text-center uppercase font-mono">

                    </div>

                    <div class="w-5/6 lg:w-6/12  text-center uppercase font-mono">
                        <p>Fichier</p>
                    </div>

                    <div class="w-0 lg:w-3/12  text-center uppercase font-mono invisible lg:visible">
                        <p>Auteur</p>
                    </div>

                    <div class="w-0 lg:w-2/12  text-center uppercase font-mono invisible lg:visible">
                        <p>Taille</p>
                    </div>

                </div>

            </div>

        </div>

        <!-- Action button -->
        <div class="flex flex-wrap md:flex-row sm:flex-row justify-center lg:flex-col m-1  lg:w-2/12  lg:fixed  lg:bottom-0 lg:right-0 lg:mb-56">

                <div class="flex lg:w-11/12 justify-center bg-grey-lighter m-2">
                    <label class="w-48 p-2 flex flex-row items-center  justify-center bg-white text-blue rounded-lg shadow-lg tracking-wide uppercase border border-blue cursor-pointer hover:bg-blue hover:text-white">
                        <svg class="w-8 h-8 mr-3" fill="currentColor" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                            <path d="M16.88 9.1A4 4 0 0 1 16 17H5a5 5 0 0 1-1-9.9V7a3 3 0 0 1 4.52-2.59A4.98 4.98 0 0 1 17 8c0 .38-.04.74-.12 1.1zM11 11h3l-4-4-4 4h3v3h2v-3z" />
                        </svg>
                        <span class="w-2-4 pl-2 justify-center text-center ">Déposer</span>
                        <form method="POST" id="formUpload" enctype="multipart/form-data">
                            <input type="hidden" name="MAX_FILE_SIZE" value="25000000">
                            <input type='file' class="hidden" name="selectedFile[]" multiple />
                        </form>
                    </label>
                </div>

                <div class=" flex lg:w-11/12 justify-center bg-grey-lighter m-2">
                    <button type="submit" id="btnUpload"  class="w-48 p-2 flex flex-row items-center  justify-center bg-white text-blue rounded-lg shadow-lg tracking-wide uppercase border border-blue cursor-pointer hover:bg-blue hover:text-white">
                        <svg class="w-8 h-8 mr-4" fill="currentColor" viewBox="0 -2 511.99974 511" width="511pt" xmlns="http://www.w3.org/2000/svg"><path d="m500.519531 5.316406c-7.871093-5.46875-17.765625-6.335937-26.472656-2.316406l-15.960937 7.378906-441.414063 205.265625c-10.085937 4.6875-16.472656 14.511719-16.66796875 25.628907-.19531225 11.121093 5.84374975 21.160156 15.75781275 26.199218l42.160156 21.433594c3.734375 1.898438 8.304687.410156 10.203125-3.328125 1.902344-3.734375.414062-8.304687-3.324219-10.203125l-42.160156-21.433594c-4.765625-2.421875-7.554687-7.054687-7.460937-12.402344.09375-5.34375 3.042968-9.878906 7.890624-12.132812l441.402344-205.253906 15.941406-7.371094c3.765626-1.738281 8.042969-1.367188 11.445313 1 3.398437 2.359375 5.242187 6.238281 4.925781 10.371094l-1.398437 18.308594-32.296875 410.21875c-.363282 4.617187-2.890625 8.566406-6.929688 10.832031-4.042968 2.265625-8.726562 2.359375-12.855468.261719l-152.273438-77.746094 78.925781-146.992188c1.984375-3.695312.597657-8.292968-3.097656-10.277344-3.691406-1.980468-8.292969-.597656-10.277344 3.097657l-82.574219 153.789062-49.125 88.730469-26.894531-129.035156 228.816407-244.261719-56.640626 105.484375c-1.980468 3.691406-.59375 8.292969 3.097657 10.277344 3.691406 1.980468 8.292969.59375 10.277343-3.097656l84.097657-156.628907c1.804687-3.355469.835937-7.53125-2.257813-9.753906-3.097656-2.226563-7.359375-1.808594-9.964844.976563l-267.542968 285.601562-98.929688-50.292969c-3.738281-1.898437-8.304687-.410156-10.203125 3.328125-1.902343 3.734375-.414062 8.304688 3.324219 10.203125l101.089844 51.390625 31.039062 148.914063c.535156 2.5625 2.351563 4.667969 4.808594 5.570312.851562.316407 1.738281.46875 2.621094.46875 1.660156 0 3.300781-.546875 4.652344-1.59375l102.355468-79.417969 107.796875 54.796876c4.117188 2.09375 8.59375 3.136718 13.0625 3.136718 4.859375 0 9.714844-1.234375 14.09375-3.6875 8.410157-4.714844 13.882813-13.269531 14.640625-22.882812l32.296875-410.234375 1.398438-18.324219c.734375-9.558594-3.527344-18.53125-11.398438-23.996094zm-254.363281 465.972656 37.609375-67.925781 30.15625 15.347657zm0 0"/></svg>                        <span class="w-2-4 pl-2 justify-center text-center ">Envoyer</span>
                    </button>
                </div>

                    <div class=" flex lg:w-11/12 justify-center bg-grey-lighter m-2">
                        <button class="w-48 p-2 flex flex-row items-center  justify-center bg-white text-blue rounded-lg shadow-lg tracking-wide uppercase border border-blue cursor-pointer hover:bg-blue hover:text-white">
                            <svg class="w-8 h-8 mr-3" fill="currentColor"  viewBox="0 0 512 512"  xmlns="http://www.w3.org/2000/svg"><path d="m256 362.667969c-8.832031 0-16-7.167969-16-16v-330.667969c0-8.832031 7.167969-16 16-16s16 7.167969 16 16v330.667969c0 8.832031-7.167969 16-16 16zm0 0"/><path d="m256 362.667969c-4.097656 0-8.191406-1.558594-11.308594-4.695313l-85.332031-85.332031c-6.25-6.25-6.25-16.382813 0-22.636719 6.25-6.25 16.382813-6.25 22.636719 0l74.023437 74.027344 74.027344-74.027344c6.25-6.25 16.386719-6.25 22.636719 0 6.25 6.253906 6.25 16.386719 0 22.636719l-85.335938 85.332031c-3.15625 3.136719-7.25 4.695313-11.347656 4.695313zm0 0"/><path d="m453.332031 512h-394.664062c-32.363281 0-58.667969-26.304688-58.667969-58.667969v-96c0-8.832031 7.167969-16 16-16s16 7.167969 16 16v96c0 14.699219 11.96875 26.667969 26.667969 26.667969h394.664062c14.699219 0 26.667969-11.96875 26.667969-26.667969v-96c0-8.832031 7.167969-16 16-16s16 7.167969 16 16v96c0 32.363281-26.304688 58.667969-58.667969 58.667969zm0 0"/></svg>
                            <span class="w-2-4 pl-2 justify-center text-center ">Télécharger</span>
                        </button>
                    </div>


                <div class=" flex lg:w-11/12 justify-center bg-grey-lighter m-2">
                    <button id="btnDelete" class="w-48 p-2 flex flex-row items-center  justify-center bg-white text-blue rounded-lg shadow-lg tracking-wide uppercase border border-blue cursor-pointer hover:bg-blue hover:text-white">
                        <svg  viewBox="-57 0 512 512" class="w-8 h-8 mr-3" fill="currentColor"  xmlns="http://www.w3.org/2000/svg"><path d="m156.371094 30.90625h85.570312v14.398438h30.902344v-16.414063c.003906-15.929687-12.949219-28.890625-28.871094-28.890625h-89.632812c-15.921875 0-28.875 12.960938-28.875 28.890625v16.414063h30.90625zm0 0"/><path d="m344.210938 167.75h-290.109376c-7.949218 0-14.207031 6.78125-13.566406 14.707031l24.253906 299.90625c1.351563 16.742188 15.316407 29.636719 32.09375 29.636719h204.542969c16.777344 0 30.742188-12.894531 32.09375-29.640625l24.253907-299.902344c.644531-7.925781-5.613282-14.707031-13.5625-14.707031zm-219.863282 312.261719c-.324218.019531-.648437.03125-.96875.03125-8.101562 0-14.902344-6.308594-15.40625-14.503907l-15.199218-246.207031c-.523438-8.519531 5.957031-15.851562 14.472656-16.375 8.488281-.515625 15.851562 5.949219 16.375 14.472657l15.195312 246.207031c.527344 8.519531-5.953125 15.847656-14.46875 16.375zm90.433594-15.421875c0 8.53125-6.917969 15.449218-15.453125 15.449218s-15.453125-6.917968-15.453125-15.449218v-246.210938c0-8.535156 6.917969-15.453125 15.453125-15.453125 8.53125 0 15.453125 6.917969 15.453125 15.453125zm90.757812-245.300782-14.511718 246.207032c-.480469 8.210937-7.292969 14.542968-15.410156 14.542968-.304688 0-.613282-.007812-.921876-.023437-8.519531-.503906-15.019531-7.816406-14.515624-16.335937l14.507812-246.210938c.5-8.519531 7.789062-15.019531 16.332031-14.515625 8.519531.5 15.019531 7.816406 14.519531 16.335937zm0 0"/><path d="m397.648438 120.0625-10.148438-30.421875c-2.675781-8.019531-10.183594-13.429687-18.640625-13.429687h-339.410156c-8.453125 0-15.964844 5.410156-18.636719 13.429687l-10.148438 30.421875c-1.957031 5.867188.589844 11.851562 5.34375 14.835938 1.9375 1.214843 4.230469 1.945312 6.75 1.945312h372.796876c2.519531 0 4.816406-.730469 6.75-1.949219 4.753906-2.984375 7.300781-8.96875 5.34375-14.832031zm0 0"/></svg>
                        <span class="w-2-4 pl-2 justify-center text-center ">Supprimer</span>
                    </button>
                </div>

                <div class=" flex lg:w-11/12 justify-center bg-grey-lighter m-2">
                    <button id="btnFolder"  class="w-auto p-2 flex flex-row items-center  justify-center bg-white text-blue rounded-lg shadow-lg tracking-wide uppercase border border-blue cursor-pointer hover:bg-blue hover:text-white">
                        <svg version="1.1"  class="w-8 h-8" fill="currentColor" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x
                              viewBox="0 0 45 45" style="enable-background:new 0 0 45 45;">
<g>
    <path d="M44.45,13.436c-0.474-0.591-1.192-0.936-1.95-0.936H40c0-1.381-1.119-2.5-2.5-2.5H35V7.5C35,6.119,33.881,5,32.5,5h-30
		C1.119,5,0,6.119,0,7.5v30C0,38.881,1.119,40,2.5,40h5h25h5c1.172,0,2.188-0.814,2.439-1.958l5-22.5
		C45.105,14.802,44.925,14.027,44.45,13.436z M2.5,7.5h30V10H30c-1.381,0-2.5,1.119-2.5,2.5h-15c-1.172,0-2.186,0.814-2.44,1.958
		c0,0-5.058,22.862-5.058,23.042H2.5V7.5L2.5,7.5z"/>
</g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g>
</svg>                        <span class="w-2-4 pl-2 justify-center text-center ">Créer un dossier</span>
                    </button>
                </div>
            <div id="insertName" class="flex lg:w-11/12 justify-center bg-grey-lighter m-2">
                <input id="folderInput" class="w-9/12 p-2 flex flex-row items-center  justify-center bg-white text-blue rounded-lg shadow-lg tracking-wide uppercase border border-blue cursor-pointer" type="text"/>

                    <button id="btnValidation" class="w-3/12 p-2 flex flex-row items-center  justify-center bg-white text-blue rounded-lg shadow-lg tracking-wide uppercase border border-blue cursor-pointer hover:bg-blue hover:text-white">
                        <svg version="1.1" class="w-8 h-6" fill="currentColor"  xmlns="http://www.w3.org/2000/svg"
                             viewBox="0 0 375.147 375.147">
                            <g><g><polygon points="344.96,44.48 119.147,270.293 30.187,181.333 0,211.52 119.147,330.667 375.147,74.667 		"/>
                             </g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g>
                        </svg>
                    </button>
            </div>
    </div>

</body>
</html>