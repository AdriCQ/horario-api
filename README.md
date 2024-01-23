# API Horario

## Endpoints

```typescript
// Filtrar horarios
axios.get<Horario[]>('horarios', {params: HorarioFilter})

// Crear horario
axios.post<Horario>('horarios', params: HorarioCreate)

// Visualizar horario
axios.get<Horario>(`horarios/${horarioId}`)

// Actualizar horario
axios.patch<Horario>(`horarios/${horarioId}`, params: HorarioUpdate)

// Eliminar horario
axios.delete(`horarios/${horarioId}`)

// Obtener usuario actual
axios.get<User>(`users`)

// Login
axios.post<AuthResponse>(`users/login`, params: UserLogin)
```

# Tipo de datos

```typescript
interface Horario {
    id: number
    facultad: string
    carrera: string
    curso: number
    content: unknown
}


interface HorarioCreate {
    facultad: string
    carrera: string
    curso: number
    content: unknown
}

type HorarioUpdate = Partial<HorarioCreate>

interface HorarioFilter {
    facultad?: string
    carrera?: string
    curso?: number
}

interface User {
    id: number
    name: string
    email: string
}


interface UserLogin {
    email: string
    password: string
}

interface AuthResponse {
    data: User
    auth_token: string
}
```
