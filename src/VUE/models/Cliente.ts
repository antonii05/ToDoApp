export interface Cliente {
    'nombre':string;
    'apellidos':string | null;
    'email':string | null;
    'direccion':string | null;
    'cod_postal': number | null,
    'provincia': string | null,
    'pais': string | null,
    'telefono': string | null,
    'telefonoFijo': string | null,
    'nif': string | null,
    'grupo_familiar': string | null,
    'activo': boolean,
    'tipo_cliente': number | null,
    'fecha_alta': Date | string | null;
    'id_usuario': number;
}