"use strict";(self.webpackChunkdocusaurus=self.webpackChunkdocusaurus||[]).push([[988],{3905:function(e,r,t){t.d(r,{Zo:function(){return c},kt:function(){return m}});var n=t(7294);function o(e,r,t){return r in e?Object.defineProperty(e,r,{value:t,enumerable:!0,configurable:!0,writable:!0}):e[r]=t,e}function a(e,r){var t=Object.keys(e);if(Object.getOwnPropertySymbols){var n=Object.getOwnPropertySymbols(e);r&&(n=n.filter((function(r){return Object.getOwnPropertyDescriptor(e,r).enumerable}))),t.push.apply(t,n)}return t}function p(e){for(var r=1;r<arguments.length;r++){var t=null!=arguments[r]?arguments[r]:{};r%2?a(Object(t),!0).forEach((function(r){o(e,r,t[r])})):Object.getOwnPropertyDescriptors?Object.defineProperties(e,Object.getOwnPropertyDescriptors(t)):a(Object(t)).forEach((function(r){Object.defineProperty(e,r,Object.getOwnPropertyDescriptor(t,r))}))}return e}function i(e,r){if(null==e)return{};var t,n,o=function(e,r){if(null==e)return{};var t,n,o={},a=Object.keys(e);for(n=0;n<a.length;n++)t=a[n],r.indexOf(t)>=0||(o[t]=e[t]);return o}(e,r);if(Object.getOwnPropertySymbols){var a=Object.getOwnPropertySymbols(e);for(n=0;n<a.length;n++)t=a[n],r.indexOf(t)>=0||Object.prototype.propertyIsEnumerable.call(e,t)&&(o[t]=e[t])}return o}var l=n.createContext({}),s=function(e){var r=n.useContext(l),t=r;return e&&(t="function"==typeof e?e(r):p(p({},r),e)),t},c=function(e){var r=s(e.components);return n.createElement(l.Provider,{value:r},e.children)},u={inlineCode:"code",wrapper:function(e){var r=e.children;return n.createElement(n.Fragment,{},r)}},d=n.forwardRef((function(e,r){var t=e.components,o=e.mdxType,a=e.originalType,l=e.parentName,c=i(e,["components","mdxType","originalType","parentName"]),d=s(t),m=o,f=d["".concat(l,".").concat(m)]||d[m]||u[m]||a;return t?n.createElement(f,p(p({ref:r},c),{},{components:t})):n.createElement(f,p({ref:r},c))}));function m(e,r){var t=arguments,o=r&&r.mdxType;if("string"==typeof e||o){var a=t.length,p=new Array(a);p[0]=d;var i={};for(var l in r)hasOwnProperty.call(r,l)&&(i[l]=r[l]);i.originalType=e,i.mdxType="string"==typeof e?e:o,p[1]=i;for(var s=2;s<a;s++)p[s]=t[s];return n.createElement.apply(null,p)}return n.createElement.apply(null,t)}d.displayName="MDXCreateElement"},8126:function(e,r,t){t.r(r),t.d(r,{assets:function(){return c},contentTitle:function(){return l},default:function(){return m},frontMatter:function(){return i},metadata:function(){return s},toc:function(){return u}});var n=t(7462),o=t(3366),a=(t(7294),t(3905)),p=["components"],i={sidebar_position:1},l="Preparaci\xf3n",s={unversionedId:"CRUD-Empleados/preparacion",id:"CRUD-Empleados/preparacion",title:"Preparaci\xf3n",description:"Creamos los siguientes archivos que utilizaremos:",source:"@site/docs/CRUD-Empleados/preparacion.md",sourceDirName:"CRUD-Empleados",slug:"/CRUD-Empleados/preparacion",permalink:"/MSC-Prestaexpress-Codeigniter-4/docs/CRUD-Empleados/preparacion",editUrl:"https://github.com/vegonz/MSC-Prestaexpress-Codeigniter-4/tree/master/docs/docs/CRUD-Empleados/preparacion.md",tags:[],version:"current",sidebarPosition:1,frontMatter:{sidebar_position:1},sidebar:"tutorialSidebar",previous:{title:"4 Trabajar con plantillas y componentes",permalink:"/MSC-Prestaexpress-Codeigniter-4/docs/plantillas"},next:{title:"Indice de empleados",permalink:"/MSC-Prestaexpress-Codeigniter-4/docs/CRUD-Empleados/indice-empleados"}},c={},u=[],d={toc:u};function m(e){var r=e.components,t=(0,o.Z)(e,p);return(0,a.kt)("wrapper",(0,n.Z)({},d,t,{components:r,mdxType:"MDXLayout"}),(0,a.kt)("h1",{id:"preparaci\xf3n"},"Preparaci\xf3n"),(0,a.kt)("p",null,"Creamos los siguientes archivos que utilizaremos:"),(0,a.kt)("ol",null,(0,a.kt)("li",{parentName:"ol"},"Creamos la carpeta ",(0,a.kt)("strong",{parentName:"li"},(0,a.kt)("em",{parentName:"strong"},"empleado"))," dentro de app/Views para todas las vistas que tengan que ver con empleados (indice, formularios)"),(0,a.kt)("li",{parentName:"ol"},"Crear el controlador de empleados en ",(0,a.kt)("inlineCode",{parentName:"li"},"app/Controllers/EmpleadoController.php"))),(0,a.kt)("pre",null,(0,a.kt)("code",{parentName:"pre",className:"language-php",metastring:'title="app/Controllers/EmpleadoController.php"',title:'"app/Controllers/EmpleadoController.php"'},"<?php\n\nnamespace App\\Controllers;\n\n// importamos los modelos que vamos a consultar\nuse App\\Models\\EmpleadoModel;\n// use App\\Models\\PuestoModel;\n// use App\\Models\\DetEmpPuestoModel;\n\nclass EmpleadoController extends BaseController\n{\n    // AQUI VA EL C\xf3DIGO DE LAS FUNCIONES DEL CONTROLADOR\n}\n")))}m.isMDXComponent=!0}}]);