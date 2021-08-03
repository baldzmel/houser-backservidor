<h1>Backend of Houser App</h1>


<p><b>Rutas:</b></p>

<ul>

### LOGIN ###
<li>Loguea Usuario => Ruta: api/auth/login
    <ul>
        <li>Recibe :
            <ul>
                <li>email</li>
                <li>password</li>
            </ul>        
        </li>
        <li>
            Retorna JSON:
            <ul>
                <li>id_user</li>
                <li>email</li>
                <li>avatar</li>
                <li>name</li>
                <li>lastname</li>
                <li>telephone</li>
                <li>address</li>
                <li>quote</li>
                <li>alt</li>
                <li>portrait</li>
                <li>birthday</li>
                <li>token</li>
            </ul>
        </li>
    </ul>
</li>
<li>Registrar Nuevo Usuario => Ruta: api/auth/signup
    <ul>
        <li>Recibe:
            <ul>
                <li>email</li>
                <li>name</li>
                <li>lastname</li>
                <li>address</li>
                <li>telephone</li>
                <li>password</li>
            </ul>
        </li>
        <li>Retorna null</li>
    </ul>
</li>

<li>Desloguea Usuario => Ruta: api/auth/logout</li>

### USERS PROFILE ###
<li>Trae el Perfil del Usuario => Ruta: api/users/{id}</li>

<li>Edita el Perfil del Usuario => Ruta: api/users/{id}/profile</li>

### SERVICES ###
<li>Trae el listado de Servicios => Ruta: api/services</li>

<li>Trae Los Servicios por ID => Ruta: service/{id}</li>

<li>Retorna los Housers por Servicios => Ruta: services/housers/{id}</li>

### ORDERS ###

<li>Retorna todos los Orders por Usuario => Ruta seria: api/orders/users/{id}
    <ul>
        <li>Recibe
            <ul>
                <li>fk_user</li>
            </ul>
        </li>
        <li>Retorna
            <ul>
                <li>id_order</li>
                <li>fk_houser</li>
                <li>name</li>
                <li>title</li>
                <li>>state</li>
                <li>created_at</li>
            </ul>
        </li>
    </ul>
</li>

<li>Genera y guarda en DB Orden de Trabajos al Houser => Ruta: api/orders/request
    <ul>
        <li>Recibe
            <ul>
                <li>fk_houser</li>
                <li>fk_service</li>
                <li>user_message</li>
                <li>fk_user (usuario autenticado)</li>
            </ul>
        </li>
        <li>Retorna
            <ul>
                <li>success</li>
                <li>data</li>
                <li>messageBody</li>
                <li>messageTitle</li>
            </ul>
        </li>
    </ul>
</li>

<li>Genera y guarda en DB Orden de Trabajos al Houser => Ruta: api/orders/save
    <ul>
        <li>Recibe
            <ul>
                <li>fk_houser</li>
                <li>fk_service</li>
                <li>user_message</li>
                <li>fk_user (usuario autenticado)</li>
            </ul>
        </li>
        <li>Retorna
            <ul>
                <li>success</li>
                <li>data</li>
                <li>messageBody</li>
                <li>messageTitle</li>
            </ul>
        </li>
    </ul>
</li> 

<li>Cambia Estado de la Orden de Pedido => Ruta: api/orders/{idorder}/{status}
    <ul>
        <li>Recibe
            <ul>
                <li>idorder</li>
                <li>status</li>
            </ul>
        </li>
    <li>Retorna
        <ul>
            <li>success</li>
            <li>message</li>
        </ul>
    </li>
    </ul>
</li>

<li>Marca como leído mensaje de Notificación => Ruta: api/notification/read/{id_order}
    <ul>
        <li>Recibe: id_order</li>
        <li>Retorna: null</li>
    </ul>
</li>

</ul>

