<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cartão de Identificação - Usuário</title>

    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700&display=swap" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>

    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        }

        .id-card {
            width: 500px;
            background: white;
            border-radius: 15px;
            box-shadow: 0 20px 60px rgba(0, 0, 0, 0.3);
            overflow: hidden;
        }

        .card-header {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            padding: 20px;
            color: white;
            text-align: center;
        }

        .card-header h1 {
            font-size: 28px;
            font-weight: 700;
            margin: 0;
            letter-spacing: 1px;
        }

        .card-content {
            padding: 30px;
        }

        .user-photo {
            width: 150px;
            height: 150px;
            border-radius: 10px;
            border: 4px solid #667eea;
            margin: 0 auto 20px;
            object-fit: cover;
            box-shadow: 0 8px 20px rgba(102, 126, 234, 0.3);
            display: block;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        }

        .photo-container {
            position: relative;
            width: 150px;
            height: 150px;
            margin: 0 auto 20px;
            border-radius: 10px;
            overflow: hidden;
            border: 4px solid #667eea;
            box-shadow: 0 8px 20px rgba(102, 126, 234, 0.3);
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .photo-container img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .photo-placeholder {
            font-size: 60px;
            color: white;
            font-weight: bold;
        }

        .user-name {
            font-size: 24px;
            font-weight: 700;
            color: #333;
            text-align: center;
            margin-bottom: 5px;
        }

        .user-title {
            font-size: 13px;
            color: #667eea;
            text-align: center;
            font-weight: 600;
            margin-bottom: 20px;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        .info-section {
            margin-bottom: 25px;
        }

        .info-row {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 15px;
            margin-bottom: 15px;
        }

        .info-item {
            background: #f8f9fa;
            padding: 12px;
            border-radius: 8px;
            border-left: 4px solid #667eea;
        }

        .info-label {
            font-size: 11px;
            color: #666;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            margin-bottom: 5px;
        }

        .info-value {
            font-size: 14px;
            color: #333;
            font-weight: 500;
        }

        .section-title {
            font-size: 12px;
            color: #667eea;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 1px;
            margin-bottom: 15px;
            padding-bottom: 10px;
            border-bottom: 2px solid #667eea;
        }

        .divider {
            height: 1px;
            background: #e0e0e0;
            margin: 20px 0;
        }

        .button-group {
            display: flex;
            gap: 10px;
            margin-top: 25px;
        }

        .btn {
            flex: 1;
            padding: 12px 20px;
            border: none;
            border-radius: 8px;
            font-weight: 600;
            font-size: 14px;
            cursor: pointer;
            transition: all 0.3s ease;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        .btn-primary {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
        }

        .btn-primary:hover {
            transform: translateY(-2px);
            box-shadow: 0 10px 25px rgba(102, 126, 234, 0.3);
        }

        .btn-secondary {
            background: #f0f0f0;
            color: #333;
            border: 2px solid #667eea;
        }

        .btn-secondary:hover {
            background: #667eea;
            color: white;
        }

        .badge {
            display: inline-block;
            background: #667eea;
            color: white;
            padding: 5px 12px;
            border-radius: 20px;
            font-size: 11px;
            font-weight: 600;
            margin-right: 5px;
        }
    </style>
</head>

<body class="flex items-center justify-center min-h-screen p-4">

    <div class="id-card">

        <!-- Header -->
        <div class="card-header">
            <h1>ID CARD</h1>
        </div>

        <!-- Content -->
        <div class="card-content">
            <!-- Foto -->
            <div class="photo-container">
                <img 
                    src="https://api.dicebear.com/7.x/avataaars/svg?seed={{ urlencode($user['firstName'] . $user['id']) }}&scale=80"
                    alt="{{ $user['firstName'] }}" 
                    class="user-photo"
                >
            </div>

            <!-- Nome e Título -->
            <div class="user-name">{{ $user['firstName'] }} {{ $user['lastName'] }}</div>
            <div class="user-title">{{ $user['company']['title'] }}</div>

            <!-- Informações Pessoais -->
            <div class="section-title">Informações Pessoais</div>
            <div class="info-row">
                <div class="info-item">
                    <div class="info-label">ID</div>
                    <div class="info-value">{{ str_pad($user['id'], 3, '0', STR_PAD_LEFT) }}</div>
                </div>
                <div class="info-item">
                    <div class="info-label">Idade</div>
                    <div class="info-value">{{ $user['age'] }} anos</div>
                </div>
            </div>

            <div class="info-row">
                <div class="info-item">
                    <div class="info-label">Gênero</div>
                    <div class="info-value">{{ ucfirst($user['gender']) }}</div>
                </div>
                <div class="info-item">
                    <div class="info-label">Grupo Sanguíneo</div>
                    <div class="info-value">{{ $user['bloodGroup'] }}</div>
                </div>
            </div>

            <div class="info-row">
                <div class="info-item">
                    <div class="info-label">Altura</div>
                    <div class="info-value">{{ number_format($user['height'], 2) }} m</div>
                </div>
                <div class="info-item">
                    <div class="info-label">Peso</div>
                    <div class="info-value">{{ number_format($user['weight'], 2) }} kg</div>
                </div>
            </div>

            <div class="divider"></div>

            <!-- Contato -->
            <div class="section-title">Contato</div>
            <div class="info-item" style="grid-column: 1/-1; margin-bottom: 10px;">
                <div class="info-label">Email</div>
                <div class="info-value" style="font-size: 12px;">{{ $user['email'] }}</div>
            </div>
            <div class="info-item" style="grid-column: 1/-1;">
                <div class="info-label">Telefone</div>
                <div class="info-value">{{ $user['phone'] }}</div>
            </div>

            <div class="divider"></div>

            <!-- Endereço -->
            <div class="section-title">Endereço</div>
            <div class="info-item" style="grid-column: 1/-1; margin-bottom: 10px;">
                <div class="info-label">Endereço</div>
                <div class="info-value" style="font-size: 12px;">{{ $user['address']['address'] }}</div>
            </div>
            <div class="info-row">
                <div class="info-item">
                    <div class="info-label">Cidade</div>
                    <div class="info-value">{{ $user['address']['city'] }}</div>
                </div>
                <div class="info-item">
                    <div class="info-label">País</div>
                    <div class="info-value">{{ $user['address']['country'] }}</div>
                </div>
            </div>

            <div class="divider"></div>

            <!-- Empresa -->
            <div class="section-title">Informações Profissionais</div>
            <div class="info-item" style="grid-column: 1/-1; margin-bottom: 10px;">
                <div class="info-label">Empresa</div>
                <div class="info-value" style="font-size: 12px;">{{ $user['company']['name'] }}</div>
            </div>
            <div class="info-row">
                <div class="info-item">
                    <div class="info-label">Departamento</div>
                    <div class="info-value">{{ $user['company']['department'] }}</div>
                </div>
            </div>

            <!-- Botões -->
            <div class="button-group">
                <button onclick="window.location.reload()" class="btn btn-primary">
                    Próximo Usuário
                </button>
                <a href="{{ url('/users') }}" class="btn btn-secondary" style="text-decoration: none; display: flex; align-items: center; justify-content: center;">
                    Voltar
                </a>
            </div>
        </div>

    </div>

</body>
</html>
