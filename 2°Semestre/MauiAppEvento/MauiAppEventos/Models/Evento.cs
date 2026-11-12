using System.ComponentModel;
using System.Runtime.CompilerServices;

namespace MauiAppEventos.Models
{
    /// <summary>
    /// Model do evento. Implementa INotifyPropertyChanged para que a tela
    /// (via BindingContext) atualize automaticamente a duração e o custo total
    /// sempre que algum dado for alterado.
    /// </summary>
    public class Evento : INotifyPropertyChanged
    {
        private string _nome = string.Empty;
        private DateTime _dataInicio = DateTime.Today;
        private DateTime _dataTermino = DateTime.Today;
        private int _numeroParticipantes = 1;
        private string _local = string.Empty;
        private decimal _custoPorParticipante;

        public event PropertyChangedEventHandler? PropertyChanged;

        // ---------- Dados informados no cadastro ----------

        public string Nome
        {
            get => _nome;
            set => Atualizar(ref _nome, value);
        }

        public DateTime DataInicio
        {
            get => _dataInicio;
            set
            {
                if (Atualizar(ref _dataInicio, value))
                    NotificarCalculados();
            }
        }

        public DateTime DataTermino
        {
            get => _dataTermino;
            set
            {
                if (Atualizar(ref _dataTermino, value))
                    NotificarCalculados();
            }
        }

        public int NumeroParticipantes
        {
            get => _numeroParticipantes;
            set
            {
                if (Atualizar(ref _numeroParticipantes, value))
                    NotificarCalculados();
            }
        }

        public string Local
        {
            get => _local;
            set => Atualizar(ref _local, value);
        }

        public decimal CustoPorParticipante
        {
            get => _custoPorParticipante;
            set
            {
                if (Atualizar(ref _custoPorParticipante, value))
                    NotificarCalculados();
            }
        }

        // ---------- Valores calculados ----------

        /// <summary>
        /// Diferença entre duas datas (DateTime - DateTime = TimeSpan).
        /// </summary>
        public TimeSpan Duracao => DataTermino - DataInicio;

        /// <summary>
        /// Duração do evento em dias, extraída do TimeSpan.
        /// </summary>
        public int DuracaoEmDias => Duracao.Days;

        /// <summary>
        /// Representação do TimeSpan para exibição (ex.: "2 dia(s) (2.00:00:00)").
        /// </summary>
        public string DuracaoFormatada => $"{DuracaoEmDias} dia(s) ({Duracao:d\\.hh\\:mm\\:ss})";

        /// <summary>
        /// Custo total = número de participantes x custo por participante.
        /// </summary>
        public decimal CustoTotal => NumeroParticipantes * CustoPorParticipante;

        // ---------- Validação ----------

        /// <summary>
        /// Retorna a mensagem do primeiro problema encontrado, ou null se os dados estão válidos.
        /// </summary>
        public string? Validar()
        {
            if (string.IsNullOrWhiteSpace(Nome))
                return "Informe o nome do evento.";

            if (DataTermino < DataInicio)
                return "A data de término não pode ser anterior à data de início.";

            if (NumeroParticipantes <= 0)
                return "O número de participantes deve ser maior que zero.";

            if (string.IsNullOrWhiteSpace(Local))
                return "Informe o local do evento.";

            if (CustoPorParticipante < 0)
                return "O custo por participante não pode ser negativo.";

            return null;
        }

        // ---------- Infraestrutura de notificação ----------

        private void NotificarCalculados()
        {
            OnPropertyChanged(nameof(Duracao));
            OnPropertyChanged(nameof(DuracaoEmDias));
            OnPropertyChanged(nameof(DuracaoFormatada));
            OnPropertyChanged(nameof(CustoTotal));
        }

        private bool Atualizar<T>(ref T campo, T valor, [CallerMemberName] string? propriedade = null)
        {
            if (EqualityComparer<T>.Default.Equals(campo, valor))
                return false;

            campo = valor;
            OnPropertyChanged(propriedade);
            return true;
        }

        protected void OnPropertyChanged([CallerMemberName] string? propriedade = null)
            => PropertyChanged?.Invoke(this, new PropertyChangedEventArgs(propriedade));
    }
}
