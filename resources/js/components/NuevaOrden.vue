<template>
    <div>
        <!-- Cabecera -->
        <!-- /////////////////////////////////////////////////////////////////////////////////////////////////////// -->
        <fieldset>
            <legend></legend>
            <div class="row">
                <!-- Fecha -->
                <div class="col-lg-2 col-md-12">
                    <div class="form-group">
                        <label>
                            <i class="icon-calendar"></i> Fecha
                        </label>
                        <input
                            v-model="fechaTransaccion"
                            type="date"
                            class="form-control input-full"
                            id="inlineinput"
                            placeholder="Ingresar Fecha"
                        />
                    </div>
                </div>

                <!-- Estado -->
                <div class="col-lg-2 col-md-12">
                    <div class="form-group">
                        <label>Estado</label>
                        <select v-model="estado_id" class="form-control">
                            <option value="1">Abierta</option>
                            <option value="2">Cerrada</option>
                        </select>
                    </div>
                </div>

                <!-- Descripción -->
                <div class="col-lg-4 col-md-12">
                    <div class="form-group">
                        <label>Descripción</label>
                        <input
                            type="text"
                            v-model="descripcion"
                            class="form-control"
                            placeholder="Ingresar Descripción del movimiento"
                        />
                    </div>
                </div>

                <!-- DEBE -->
                <div class="col-lg-2 col-md-6">
                    <div class="form-group">
                        <label class="text-success">TOTAL DEBE</label>
                        <h3 class="form-control fw-bold" readonly>$ {{ totalDebe }}.-</h3>
                    </div>
                </div>

                <!-- HABER -->
                <div class="col-lg-2 col-md-6">
                    <div class="form-group">
                        <label class="text-danger">TOTAL HABER</label>
                        <h3 class="form-control fw-bold" readonly>$ {{ totalHaber }}.-</h3>
                    </div>
                </div>
            </div>
        </fieldset>

        <!-- Detalle -->
        <!-- /////////////////////////////////////////////////////////////////////////////////////////////////////// -->
        <fieldset>
            <legend></legend>
            <div class="col-lg-12">
                <div class="row">
                    <div class="col-lg-10">
                        <ul class="nav nav-pills nav-primary" id="pills-tab" role="tablist">
                            <li class="nav-item">
                                <a
                                    class="nav-link active"
                                    id="pills-cargar-tab"
                                    data-toggle="pill"
                                    href="#pills-cargar"
                                    role="tab"
                                    aria-controls="pills-cargar"
                                    aria-selected="true"
                                >Movimientos</a>
                            </li>
                            <li class="nav-item">
                                <a
                                    class="nav-link"
                                    id="pills-debe-tab"
                                    data-toggle="pill"
                                    href="#pills-debe"
                                    role="tab"
                                    aria-controls="pills-debe"
                                    aria-selected="false"
                                >Debe</a>
                            </li>
                            <li class="nav-item">
                                <a
                                    class="nav-link"
                                    id="pills-haber-tab"
                                    data-toggle="pill"
                                    href="#pills-haber"
                                    role="tab"
                                    aria-controls="pills-haber"
                                    aria-selected="false"
                                >Haber</a>
                            </li>
                        </ul>
                    </div>
                    <div class="col-lg-2">
                        <button
                            @click="asignarFecha()"
                            class="btn btn-primary pull-right"
                            data-toggle="modal"
                            data-target="#newRow"
                        >
                            <i class="icon-plus"></i>
                            Agregar
                        </button>
                    </div>
                </div>
                <hr/>
            </div>
            <div class="col-lg-12">
                <div class="row">
                    <div class="col-lg-12">
                          <span class="text-muted pull-right fw-extrabold">
                            -- Ingrese un movimiento --
                            <i class="flaticon-upward large"></i>
                          </span>
                    </div>
                </div>
            </div>
            <div class="col-lg-12">
                <div class="tab-content" id="pills-tabContent">
                    <div
                        class="tab-pane fade show active"
                        id="pills-cargar"
                        role="tabpanel"
                        aria-labelledby="pills-cargar-tab"
                    >
                        <div class="table-responsive">
                            <table class="table table-bordered table-bordered-bd mt-4">
                                <thead>
                                <tr>
                                    <th scope="col">Beneficario</th>
                                    <th scope="col">Concepto</th>
                                    <th scope="col">Detalle</th>
                                    <th scope="col">Forma de Pago</th>
                                    <th scope="col" class="text-success">Debe</th>
                                    <th scope="col" class="text-danger">Haber</th>
                                </tr>
                                </thead>
                                <tbody>
                                    <tr v-for="mov_debe in rows_debe">
                                        <td>{{ mov_debe.beneficiario }}</td>
                                        <td>{{ mov_debe.concepto }}</td>
                                        <td>{{ mov_debe.nota }}</td>
                                        <td>{{ mov_debe.cheque }}</td>
                                        <td>$ {{ mov_debe.importe }}</td>
                                        <td></td>
                                    </tr>
                                    <tr v-for="mov_haber in rows_haber">
                                        <td>{{ mov_haber.beneficiario }}</td>
                                        <td>{{ mov_haber.concepto }}</td>
                                        <td>{{ mov_haber.nota }}</td>
                                        <td>{{ mov_haber.banco }}</td>
                                        <td></td>
                                        <td class="text-danger">$ {{ mov_haber.importe }}</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div
                        class="tab-pane fade"
                        id="pills-debe"
                        role="tabpanel"
                        aria-labelledby="pills-debe-tab"
                    >
                        <div class="table-responsive">
                            <table class="table table-bordered table-bordered-bd-success mt-4">
                                <thead>
                                    <tr>
                                        <th scope="col">Concepto</th>
                                        <th scope="col">Beneficiario</th>
                                        <th scope="col">Banco/Cod. Operación</th>
                                        <th scope="col">Nota</th>
                                        <th scope="col">Importe</th>
                                        <th scope="col">Acciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr v-for="(debe, index) in rows_debe" :key="index">
                                        <td>{{ debe.concepto }}</td>
                                        <td>{{ debe.beneficiario }}</td>
                                        <td>{{ debe.cuenta }} / {{ debe.cheque }}</td>
                                        <td>{{ debe.nota }}</td>
                                        <td>$ {{ debe.importe }}</td>
                                        <td>
                                            <button
                                                type="button"
                                                class="btn btn-danger btn-xs"
                                                v-on:click="borrarDebe(index)"
                                            >
                                                <i class="icon-trash"></i>
                                            </button>
                                            <button
                                                type="button"
                                                class="btn btn-info btn-xs"
                                                @click="showModalEdit(index, 'debe')"
                                            >
                                                <i class="icon-pencil"></i>
                                            </button>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div
                        class="tab-pane fade"
                        id="pills-haber"
                        role="tabpanel"
                        aria-labelledby="pills-haber-tab"
                    >
                        <div class="table-responsive">
                            <table class="table table-bordered table-bordered-bd-danger mt-4">
                                <thead>
                                    <tr>
                                        <th scope="col">Concepto</th>
                                        <th scope="col">Beneficiario</th>
                                        <th scope="col">Banco</th>
                                        <th scope="col">Nota</th>
                                        <th scope="col">Importe</th>
                                        <th scope="col">Acciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr v-for="(haber, index) in rows_haber" :key="index">
                                        <td>{{ haber.concepto }}</td>
                                        <td>{{ haber.beneficiario }}</td>
                                        <td>{{ haber.banco }} / {{ haber.cheque }}</td>
                                        <td>{{ haber.nota }}</td>
                                        <td>$ {{ haber.importe }}</td>
                                        <td>
                                            <button
                                                type="button"
                                                class="btn btn-danger btn-xs"
                                                v-on:click="borrarHaber(index)"
                                            >
                                                <i class="icon-trash"></i>
                                            </button>
                                            <button
                                                type="button"
                                                class="btn btn-info btn-xs"
                                                @click="showModalEdit(index, 'haber')"
                                            >
                                                <i class="icon-pencil"></i>
                                            </button>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </fieldset>
        <template v-if="true">
            <fieldset class="mt-3 p-3">
                <div class="row">
                    <div class="col-md-12">
                        <button @click="guardarOrden()" :class="className" v-html="btn_actualizar"></button>
                        <a
                            v-bind:href="urlPrint"
                            target="_blank"
                            v-if="idOrden"
                            class="btn btn-info pull-right mr-2">
                            <i class="icon-printer"></i> Imprimir
                        </a>
                    </div>
                </div>
            </fieldset>
        </template>
        <!-- template for the modal component -->
        <!-- app -->
        <div class="modal fade" tabindex="-1" role="dialog" id="newRow">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">
                            <i class="icon-refresh"></i> Nuevo Movimiento
                        </h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form v-on:submit.prevent>
                            <div class="row">
                                <!-- Tipo Movimiento -->
                                <div class="col-lg-5">
                                    <div class="form-group">
                                        <label class="form-label">Tipo Movimiento</label>
                                        <div class="selectgroup w-100">
                                            <label class="selectgroup-item">
                                                <input
                                                    v-model="tipo"
                                                    type="radio"
                                                    name="tipo"
                                                    value="debe_haber"
                                                    class="selectgroup-input"
                                                />
                                                <span class="selectgroup-button">Debe y Haber</span>
                                            </label>
                                            <label class="selectgroup-item">
                                                <input
                                                    v-model="tipo"
                                                    type="radio"
                                                    name="tipo"
                                                    value="debe"
                                                    class="selectgroup-input"
                                                />
                                                <span class="selectgroup-button">Debe</span>
                                            </label>
                                            <label class="selectgroup-item">
                                                <input
                                                    v-model="tipo"
                                                    type="radio"
                                                    name="tipo"
                                                    value="haber"
                                                    class="selectgroup-input"
                                                />
                                                <span class="selectgroup-button">Haber</span>
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <!-- Beneficiario Nombre -->
                                <div class="col-lg-4 col-md-6">
                                    <div class="form-group">
                                        <label>Beneficiario por Nombre:</label>
                                        <v-select
                                            v-model="beneficiario"
                                            :options="beneficiarios"
                                            :reduce="beneficiarios => beneficiarios"
                                            label="razon_social"
                                        ></v-select>
                                    </div>
                                </div>
                                <!-- Beneficiario Número -->
                                <div class="col-lg-3 col-md-6">
                                    <div class="form-group">
                                        <label>Beneficiario por Número:</label>
                                        <v-select
                                            v-model="beneficiario"
                                            :options="beneficiarios"
                                            :reduce="beneficiarios => beneficiarios"
                                            label="codigo"
                                        ></v-select>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <!-- Descripción -->
                                <div class="col-lg-5 col-md-12">
                                    <div class="form-group">
                                        <label>Importe</label>
                                        <currency-input
                                            @keydown.enter.prevent="guardarMovimiento"
                                            v-model="importe"
                                            v-bind="money"
                                            class="form-control" />
                                    </div>
                                </div>
                                <!-- Concepto Nombre -->
                                <div class="col-lg-4 col-md-6">
                                    <div class="form-group">
                                        <label>Concepto por Nombre:</label>
                                        <v-select
                                            v-model="concepto"
                                            :options="conceptos"
                                            :reduce="conceptos => conceptos"
                                            label="descripcion"
                                        ></v-select>
                                    </div>
                                </div>
                                <!-- Concepto Número -->
                                <div class="col-lg-3 col-md-6">
                                    <div class="form-group">
                                        <label>Concepto por Número:</label>
                                        <v-select
                                            v-model="concepto"
                                            :options="conceptos"
                                            :reduce="conceptos => conceptos"
                                            label="codigo"
                                        ></v-select>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <template v-if="(tipo == 'debe' || tipo == 'debe_haber') && beneficiario">
                                    <!-- Banco Beneficiario -->
                                    <div class="col-lg-12 col-md-12">
                                        <div class="form-group">
                                            <label>Cuentas Beneficiarios</label>
                                            <select class="form-control" v-model="cuentaSeleccionada">
                                                <option
                                                    v-for="(cuenta, index) in beneficiario.cuentas"
                                                    v-bind:value="cuenta"
                                                    :key="index"
                                                >Titular: {{ cuenta.titular }}  /  Banco: {{cuenta.banco}}
                                                </option>
                                            </select>
                                        </div>
                                    </div>
                                </template>
                                <template v-if="(tipo == 'haber' || tipo == 'debe_haber') && beneficiario">
                                    <!-- Banco Propio -->
                                    <div class="col-lg-3 col-md-3">
                                        <div class="form-group">
                                            <label>Bancos Propios Código</label>
                                            <v-select
                                                v-model="bancoSeleccionado"
                                                :options="bancosPropios"
                                                :reduce="bancos => bancos"
                                                label="codigo"
                                            ></v-select>
                                        </div>
                                    </div>
                                    <div class="col-lg-9 col-md-9">
                                        <div class="form-group">
                                            <label>Bancos Propios</label>
                                            <v-select
                                                v-model="bancoSeleccionado"
                                                :options="bancosPropios"
                                                :reduce="bancos => bancos"
                                                label="descripcion"
                                            ></v-select>
                                        </div>
                                    </div>
                                </template>
                            </div>
                            <div class="row">
                                <!-- Cheque Código -->
                                <div class="col-lg-4 col-md-12" v-if="(tipo == 'haber' || tipo == 'debe_haber')">
                                    <div class="form-group">
                                        <label>Cod. Operación</label>
                                        <input
                                            v-model="cheque"
                                            type="text"
                                            name="cheque"
                                            class="form-control"
                                            placeholder="Ingrese detalle cheque"
                                        />
                                    </div>
                                </div>
                                <!-- Cheque Fecha -->
                                <div class="col-lg-4 col-md-12">
                                    <div class="form-group">
                                        <label>Fecha de Cobro</label>
                                        <input
                                            v-model="fecha_cobro"
                                            type="date"
                                            name="fecha_cobro"
                                            class="form-control"
                                        />
                                    </div>
                                </div>
                                <!-- Nota -->
                                <div class="col-lg-4 col-md-12">
                                    <div class="form-group">
                                        <label>Nota</label>
                                        <input
                                            v-model="nota"
                                            type="text"
                                            name="nota"
                                            class="form-control"
                                            placeholder="Ingrese una nota"
                                        />
                                    </div>
                                </div>
                                <!-- Responsable de Cobro -->
                                <div class="col-md-12" v-if="tipo == 'haber' || tipo == 'debe_haber'">
                                    <div class="form-group">
                                        <label>Responsable de Cobro</label>
                                        <input
                                            v-model="responsable"
                                            type="text"
                                            name="responsable"
                                            class="form-control"
                                            placeholder="Ingrese el nombre de la persona que recibe el pago ..."
                                        />
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <template v-if="tipo == 'haber'">
                                    <div class="col-lg-12" v-if="importe">
                                        <div class="form-group">
                                            <button type="button" @click="guardarMovimiento(true)" class="btn btn-outline-dark pull-right" data-dismiss="modal">
                                                <i class="icon-check"></i> Grabar y Cerrar
                                            </button>

                                            <button type="button" @click="guardarMovimiento()" class="btn btn-primary pull-right mr-2">
                                                <i class="icon-check"></i> Grabar
                                            </button>

                                            <button type="button" class="btn btn-info pull-right mr-2" data-dismiss="modal">
                                                <i class="icon-close"></i> Cerrar
                                            </button>
                                        </div>
                                    </div>
                                </template>
                                <template v-if="tipo == 'debe' || tipo == 'debe_haber' ">
                                    <div class="col-lg-12" v-if="concepto && importe">
                                        <div class="form-group">
                                            <button type="button" @click="guardarMovimiento(true)" class="btn btn-outline-dark pull-right" data-dismiss="modal">
                                                <i class="icon-check"></i> Grabar y Cerrar
                                            </button>

                                            <button type="button" @click="guardarMovimiento()" class="btn btn-primary pull-right mr-2">
                                                <i class="icon-check"></i> Grabar
                                            </button>

                                            <button type="button" class="btn btn-info pull-right mr-2" data-dismiss="modal">
                                                <i class="icon-close"></i> Cerrar
                                            </button>
                                        </div>
                                    </div>
                                </template>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- tabindex="-1"-->
        <modal id="modalEdit"
               name="modalEdit"
               :adaptative=true
               :min-width="200"
               :min-height="200"
               width="70%"
               height="auto"
               :scrollable="true"
               :reset="true"
               transition="nice-modal-fade"
               :draggable=true
               @before-close="limpiar()">
            <div class="row row-card-no-pd">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="card-head-row card-tools-still-right">
                                <h5 class="card-title">
                                    <i class="icon-refresh"></i> Editar Movimiento
                                    <strong :class="tipo == 'debe' ? 'text-success' : 'text-danger'">{{ tipo  | uppercase }}</strong>
                                </h5>
                                <div class="card-tools">
                                    <button class="btn btn-icon btn-link btn-xs" @click="hideModalEdit()"><span
                                        class="fa fa-times"></span></button>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <form v-on:submit.prevent>
                                <div class="row">
                                    <!-- Beneficiario Nombre -->
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label>Beneficiario por Nombre:</label>
                                            <v-select
                                                v-model="beneficiario"
                                                :options="beneficiarios"
                                                :reduce="beneficiarios => beneficiarios"
                                                label="razon_social"
                                            ></v-select>
                                        </div>
                                    </div>
                                    <!-- Beneficiario Número -->
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label>Beneficiario por Número:</label>
                                            <v-select
                                                v-model="beneficiario"
                                                :options="beneficiarios"
                                                :reduce="beneficiarios => beneficiarios"
                                                label="codigo"
                                            ></v-select>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <!-- Descripción -->
                                    <div class="col-lg-5 col-md-12">
                                        <div class="form-group">
                                            <label>Importe</label>
                                            <currency-input
                                                v-model="importe"
                                                v-bind="money"
                                                class="form-control" />
                                        </div>
                                    </div>
                                    <!-- concepto Nombre -->
                                    <div class="col-lg-4 col-md-6">
                                        <div class="form-group">
                                            <label>Concepto por Nombre:</label>
                                            <v-select
                                                v-model="concepto"
                                                :options="conceptos"
                                                :reduce="conceptos => conceptos"
                                                label="descripcion"
                                            ></v-select>
                                        </div>
                                    </div>
                                    <!-- concepto Número -->
                                    <div class="col-lg-3 col-md-6">
                                        <div class="form-group">
                                            <label>Concepto por Número:</label>
                                            <v-select
                                                v-model="concepto"
                                                :options="conceptos"
                                                :reduce="conceptos => conceptos"
                                                label="codigo"
                                            ></v-select>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <template v-if="(tipo == 'debe' || tipo == 'debe_haber') && beneficiario">
                                        <!-- banco beneficiario -->
                                        <div class="col-lg-12 col-md-12">
                                            <div class="form-group">
                                                <label>Cuentas Beneficiarios</label>
                                                <select class="form-control" v-model="cuentaSeleccionada">
                                                    <option
                                                        v-for="(cuenta, index) in beneficiario.cuentas"
                                                        v-bind:value="cuenta"
                                                        :key="index"
                                                    >{{cuenta.titular}} --> {{cuenta.banco}}
                                                    </option>
                                                </select>
                                            </div>
                                        </div>
                                    </template>
                                    <template v-if="(tipo == 'haber' || tipo == 'debe_haber') && beneficiario">
                                        <!-- banco propio -->
                                        <div class="col-lg-12 col-md-12">
                                            <div class="form-group">
                                                <label>Bancos Propios</label>
                                                <select class="form-control" v-model="bancoSeleccionado">
                                                    <option
                                                        v-for="(banco, index) in bancosPropios"
                                                        v-bind:value="banco"
                                                        :key="index"
                                                    >{{banco.descripcion}} --> {{banco.cbu}}
                                                    </option>
                                                </select>
                                            </div>
                                        </div>
                                    </template>
                                </div>
                                <div class="row">
                                    <!-- cheque -->
                                    <div class="col-lg-4 col-md-12" v-if="(tipo == 'haber' || tipo == 'debe_haber')">
                                        <div class="form-group">
                                            <label>Cod. Operación</label>
                                            <input
                                                v-model="cheque"
                                                type="text"
                                                name="cheque"
                                                class="form-control"
                                                placeholder="Ingrese detalle cheque"
                                            />
                                        </div>
                                    </div>
                                    <!-- cheque -->
                                    <div class="col-lg-4 col-md-12">
                                        <div class="form-group">
                                            <label>Fecha de Cobro</label>
                                            <input
                                                v-model="fecha_cobro"
                                                type="date"
                                                name="fecha_cobro"
                                                class="form-control"
                                            />
                                        </div>
                                    </div>
                                    <!-- nota -->
                                    <div class="col-lg-4 col-md-12">
                                        <div class="form-group">
                                            <label>Nota</label>
                                            <input
                                                v-model="nota"
                                                type="text"
                                                name="nota"
                                                class="form-control"
                                                placeholder="Ingrese una nota"
                                            />
                                        </div>
                                    </div>
                                    <div class="col-md-12" v-if="tipo == 'haber'">
                                        <div class="form-group">
                                            <label>Responsable de Cobro</label>
                                            <input
                                                v-model="responsable"
                                                type="text"
                                                name="responsable"
                                                class="form-control"
                                                placeholder="Ingrese un responsable de cobro..."
                                            />
                                        </div>
                                    </div>
                                </div>
                                <div class="row">

                                    <div class="col-lg-12" v-if="tipo == 'haber' && importe">
                                        <div class="form-group">
                                            <button @click="guardarMovimiento()" class="btn btn-primary pull-right">
                                                <i class="icon-check"></i> Cargar
                                            </button>
                                            <button type="button"
                                                    class="btn btn-info pull-right mr-2"
                                                    @click="hideModalEdit()">
                                                <i class="icon-close"></i> Cerrar
                                            </button>
                                        </div>
                                    </div>

                                    <div class="col-lg-12" v-if="(tipo == 'debe' && concepto) && importe">
                                        <div class="form-group">
                                            <button @click="guardarMovimiento()" class="btn btn-primary pull-right">
                                                <i class="icon-check"></i> Cargar
                                            </button>
                                            <button type="button"
                                                    class="btn btn-info pull-right mr-2"
                                                    @click="hideModalEdit()">
                                                <i class="icon-close"></i> Cerrar
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </modal>
    </div>
</template>

<script>
    import "vuejs-noty/dist/vuejs-noty.css";
    import "vue-select/dist/vue-select.css";

    export default {
        props: {
            orden: ""
        },
        data() {
            return {
                idOrden: null,
                urlPrint: null,
                beneficiarios: [],
                beneficiario: null,
                idBeneficiario: null,

                tipo: "debe_haber",
                cheque: null,
                estado_id: null,
                fecha_cobro: null,
                nota: null,
                conceptos: [],
                concepto: null,
                responsable: null,

                bancoSeleccionado: null,
                cuentaSeleccionada: null,
                bancosPropios: [],

                className: "btn btn btn-primary pull-right",
                btn_actualizar: "<i class='icon-check'></i> Guardar Orden",

                importe: 0.0,
                descripcion: null,
                fechaTransaccion: new Date().toISOString().slice(0,10),
                rows_debe: [],
                rows_haber: [],
                totalDebe: 0,
                totalHaber: 0,

                money: {},
                indexEdit: null, //lo uso para tomar el indice de los array para editar
                abrirModalEditar: false,
                objOrden: null,
            };
        },
        methods: {
            showModalEdit(index, tipo) {
                let elem;
                if(tipo === "debe"){
                    elem = this.rows_debe[index];
                    this.tipo = tipo;
                    this.indexEdit = index;
                    this.importe = elem.importe;
                    this.cheque = elem.cheque;
                    this.fecha_cobro = elem.fecha_cobro;
                    this.beneficiario = this.beneficiarios.filter(b => b.id === elem.beneficiario_id)[0];
                    this.concepto = this.conceptos.filter(c => c.id === elem.concepto_id)[0];
                    this.nota = elem.nota;
                    this.responsable = elem.responsable;
                    this.cuentaSeleccionada = this.beneficiario.cuentas.filter(c => c.id === elem.cuenta_id);
                    this.cuentaSeleccionada = this.cuentaSeleccionada ? this.cuentaSeleccionada[0] : null;
                }else{
                    elem = this.rows_haber[index];
                    this.tipo = tipo;
                    this.indexEdit = index;
                    this.importe = elem.importe;
                    this.cheque = elem.cheque;
                    this.fecha_cobro = elem.fecha_cobro;
                    this.beneficiario = this.beneficiarios.filter(b => b.id === elem.beneficiario_id)[0];
                    this.concepto = this.conceptos.filter(c => c.id === elem.concepto_id)[0];
                    this.nota = elem.nota;
                    this.responsable = elem.responsable;
                    this.bancoSeleccionado = this.bancosPropios.filter(c => c.id === elem.banco_id);
                    this.bancoSeleccionado = this.bancoSeleccionado ? this.bancoSeleccionado[0] : null;
                }

                debugger;

                this.$modal.show('modalEdit');
            },
            hideModalEdit() {
                this.$modal.hide('modalEdit');
            },
            search() {
                this.beneficiario = this.beneficiarios.find(s => {
                    return s.id == this.idBeneficiario;
                });
            },
            asignarFecha() {
                this.fecha_cobro = this.fechaTransaccion;
            },
            guardarOrden() {

                if (this.totalDebe > 0 && this.totalDebe === this.totalHaber) {

                    this.className = "btn btn btn-warning pull-right";

                    this.btn_actualizar = "<i class='icon-spinner4 spinner'></i> Guardando...";

                    if (this.idOrden) {
                        axios
                            .post("/ordenes/update", {
                                idOrden: this.idOrden,
                                fechaTransaccion: this.fechaTransaccion,
                                estado_id: this.estado_id,
                                descripcion: this.descripcion,
                                rows_debe: this.rows_debe,
                                rows_haber: this.rows_haber
                            })
                            .then(res => {
                                this.className = "btn btn btn-primary pull-right";
                                this.btn_actualizar = "<i class='icon-check'></i> Cargar";
                                this.$noty.success(
                                    "<b>Correcto</b><p>Se guardo la nueva orden.</p>",
                                    {
                                        killer: true
                                    }
                                );
                                this.idOrden = res.data;
                            })
                            .catch(error => {
                                this.className = "btn btn btn-primary pull-right";
                                this.btn_actualizar = "<i class='icon-check'></i> Cargar";
                                this.$noty.error("Hubo algun error al guardar", {
                                    killer: true
                                });
                            });
                    } else {
                        axios
                            .post("/ordenes/store", {
                                fechaTransaccion: this.fechaTransaccion,
                                estado_id: this.estado_id,
                                descripcion: this.descripcion,
                                rows_debe: this.rows_debe,
                                rows_haber: this.rows_haber
                            })
                            .then(res => {
                                this.className = "btn btn btn-primary pull-right";
                                this.btn_actualizar = "<i class='icon-check'></i> Cargar";
                                this.$noty.success(
                                    "<b>Correcto</b><p>Se guardo la nueva orden.</p>",
                                    {
                                        killer: true
                                    }
                                );
                                this.idOrden = res.data;
                                this.urlPrint = "/ordenes/" + this.idOrden + "/print"
                            })
                            .catch(error => {
                                this.className = "btn btn btn-primary pull-right";
                                this.btn_actualizar = "<i class='icon-check'></i> Cargar";
                                this.$noty.error("Hubo algun error al guardar", {
                                    killer: true
                                });
                            });
                    }
                } else {
                    this.$noty.error("<b>Error</b><p>El asiento no balancea.</p>", {
                        killer: true
                    });
                }
            },
            guardarMovimiento(close = false) {

                if(close)
                    $('#newRow').modal('hide');

                let obj = this.llenarObj();

                let msg = "<b>Agregado Correctamente</b><p>Se cargó un nuevo movimiento.</p>";

                if (this.tipo == "debe") {

                    if (this.indexEdit != null) {
                        this.rows_debe[this.indexEdit] = obj;
                        this.$modal.hide('modalEdit');
                        msg = "<b>Editado Correctamente</b><p>Se editó el movimiento.</p>"
                    } else {
                        this.rows_debe.push(obj);
                    }

                } else if (this.tipo == "haber") {
                    if (this.indexEdit != null) {
                        this.rows_haber[this.indexEdit] = obj
                        this.$modal.hide('modalEdit');
                        msg = "<b>Editado Correctamente</b><p>Se editó el movimiento.</p>"
                    } else {
                        this.rows_haber.push(obj);
                    }

                } else {
                    this.rows_debe.push(obj);
                    this.rows_haber.push(obj);
                }

                this.totalDebe = this.calcTotalDebe();

                this.totalHaber = this.calcTotalHaber();

                this.limpiar();

                this.$noty.success(
                    msg,
                    {
                        killer: true
                    }
                );
            },

            limpiar(){
                this.indexEdit = null
                this.importe = 0.00;
                this.cheque = null;
                this.concepto = null;
                this.nota = null;
                this.responsable = null;
                this.tipo = "debe_haber";
                this.beneficiario = null;
            },

            llenarObj() {

                let obj = {
                    importe: this.importe,
                    cheque: this.cheque,
                    fecha_cobro: this.fecha_cobro,
                    concepto_id: this.concepto ? this.concepto.id : null,
                    beneficiario: this.beneficiario.razon_social,
                    beneficiario_id: this.beneficiario.id,
                    concepto: this.concepto ? this.concepto.descripcion : null,
                    nota: this.nota,
                    responsable: this.responsable,
                    cuenta: this.cuentaSeleccionada ? this.cuentaSeleccionada.titular : null,
                    cuenta_id: this.cuentaSeleccionada ? this.cuentaSeleccionada.id : null,
                    banco_id: this.bancoSeleccionado ? this.bancoSeleccionado.id : null,
                    banco: this.bancoSeleccionado ? this.bancoSeleccionado.descripcion : null
                };

                return obj;
            },
            borrarDebe(indice) {
                this.rows_debe.splice(indice, 1);

                this.totalDebe = this.calcTotalDebe();

                this.$noty.warning(
                    "<b>Eliminado Correctamente</b><p>Se elimino un movimiento.</p>",
                    {
                        killer: true
                    }
                );
            },
            borrarHaber(indice) {
                this.rows_haber.splice(indice, 1);

                this.totalHaber = this.calcTotalHaber();

                this.$noty.warning(
                    "<b>Eliminado Correctamente</b><p>Se elimino un movimiento.</p>",
                    {
                        killer: true
                    }
                );
            },
            calcTotalDebe() {
                return this.rows_debe.reduce(function (total, item) {
                    return parseFloat(total) + parseFloat(item.importe);
                }, 0);
            },
            calcTotalHaber: function () {
                return this.rows_haber.reduce(function (total, item) {
                    return parseFloat(total) + parseFloat(item.importe);
                }, 0);
            }
        },
        mounted() {
            axios.get("/api/beneficiarios").then(res => {
                this.beneficiarios = res.data;
            });
            axios.get("/api/conceptos").then(res => {
                this.conceptos = res.data;
            });
            axios.get("/api/bancos").then(res => {
                this.bancosPropios = res.data;
            });

            this.estado_id = 1;

            if (this.orden) {

                this.objOrden = JSON.parse(this.orden);
                this.idOrden = this.objOrden.id;
                this.urlPrint = "/ordenes/" + this.idOrden + "/print";
                this.fechaTransaccion = this.objOrden.fechaTransaccion.slice(0,10);
                this.estado_id = this.objOrden.estado_id;
                this.descripcion = this.objOrden.descripcion;
                this.beneficiario = this.objOrden.beneficiario;

                this.objOrden.detalles.forEach(element => {
                    let obj = {
                        importe: element.importe,
                        cheque: element.cheque,
                        fecha_cobro: element.fecha_cobro,
                        concepto_id: element.concepto ? element.concepto.id : null,
                        concepto: element.concepto ? element.concepto.descripcion : null,
                        beneficiario_id: element.beneficiario.id,
                        beneficiario: element.beneficiario.razon_social,
                        banco_id: element.banco ? element.banco.id : null,
                        banco: element.banco ? element.banco.descripcion : null,
                        cuenta_id: element.cuenta ? element.cuenta.id : null,
                        cuenta: element.cuenta ? element.cuenta.titular : null,
                        nota: element.nota,
                        responsable: element.responsable,
                    };

                    if (element.tipo == "debe") {
                        this.rows_debe.push(obj);
                        this.totalDebe = this.calcTotalDebe()
                    } else {
                        this.rows_haber.push(obj);
                        this.totalHaber = this.calcTotalHaber()
                    }
                });
            }
        },
        watch:{
            totalDebe(){
                return this.rows_debe.reduce(function(total, item) {
                    return (parseFloat(total) + parseFloat(item.importe)).toFixed(2);
                }, 0);
            },
            totalHaber(){
                return this.rows_haber.reduce(function(total, item) {
                    return (parseFloat(total) + parseFloat(item.importe)).toFixed(2);
                }, 0);
            }
        },
        filters:{
            uppercase(x) {
                return x.toUpperCase();
            },
        }
    };
</script>

<style>
    .vs__search {
        font-size: 1.5em !important;
    }
    .v--modal-overlay{
        position: fixed;
        top: 0;
        right: 0;
        bottom: 0;
        left: 0;
        z-index: 1050;
        outline: 0;
        border-radius: .4rem!important;
        border: 0!important;
        background: rgba(0, 0, 0, 0.4);
    }
    .table-responsive .table-bordered{
        border: 1px solid #dee2e6 !important;
    }
</style>
