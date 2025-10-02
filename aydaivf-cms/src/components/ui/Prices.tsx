// src/components/ui/Prices.tsx
import { OurPricesResponse } from "@/lib/cms";

type Props = { data: OurPricesResponse };
const fmt = (n:number,c:string)=>new Intl.NumberFormat("tr-TR",{maximumFractionDigits:0}).format(n)+(c.toUpperCase()==="EUR"?" Euro":` ${c}`);

export default function Prices({ data }: Props) {
    const hero = data.heroImage ?? "https://api.aydaivf.com/uploads/elitebig_7bc1166778.jpg";
    const sec0 = data.sections?.[0];         // "Tüp Bebek Fiyatları"
    const sec1 = data.sections?.[1];         // "İşlemlerimize ..."

    return (
        <main className="flex-1 flex flex-col">
            <div>
                <div
                    className="bg-gray-300 w-full aspect-[16/7] md:aspect-[16/5] max-h-[400px]"
                    style={{ backgroundImage:`url("${hero}")`, backgroundRepeat:"no-repeat", backgroundPosition:"center center", backgroundSize:"cover" }}
                />
                <div className="container flex flex-col gap-5 py-5 md:py-10">
                    <p className="text-ayda-blue text-lg md:text-xl text-center uppercase font-medium">{data.title}</p>

                    <div className="flex flex-col gap-7 md:gap-10">
                        <div className="flex flex-col gap-3">
                            <div className="flex flex-col gap-6 items-center">
                                <div className="flex-1 flex flex-col gap-2">
                                    <div className="text-sm md:text-base text-ayda-gray-dark flex flex-col gap-1">
                                        <div className="flex flex-col gap-3">
                                            <div className="flex flex-col lg:flex-row gap-6 items-center">
                                                <div className="flex-1 flex flex-col gap-2">
                                                    {sec0?.heading ? (
                                                        <p className="text-sm md:text-base text-ayda-pink-light capitalize font-medium text-center">
                                                            {sec0.heading}
                                                        </p>
                                                    ) : null}
                                                    {data.intro ? (
                                                        <div className="text-sm md:text-base text-ayda-gray-dark flex flex-col gap-1">
                                                            <div dangerouslySetInnerHTML={{ __html: data.intro }} />
                                                        </div>
                                                    ) : null}
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div className="overflow-x-auto mt-3">
                                        <figure className="table" style={{minWidth:"100%"}}>
                                            <table className="min-w-full border border-gray-300 text-xs md:text-sm">
                                                <thead>
                                                <tr className="bg-gray-100">
                                                    <th className="text-left p-3 border-b border-gray-300 font-semibold"><strong>Tedavi Tipi</strong></th>
                                                    <th className="text-left p-3 border-b border-gray-300 font-semibold"><strong>Fiyatı</strong></th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                {data.items.map(it=>(
                                                    <tr key={it.slug} className="hover:bg-gray-50 transition-colors">
                                                        <td className="p-3 border-b border-gray-300">{it.name}</td>
                                                        <td className="p-3 border-b border-gray-300">
                                                            {fmt(it.amount,it.currency)}{it.unit?` (${it.unit})`:""}
                                                        </td>
                                                    </tr>
                                                ))}
                                                </tbody>
                                            </table>
                                        </figure>
                                    </div>
                                </div>
                            </div>
                        </div>

                        {sec1?.heading || sec1?.html ? (
                            <div className="flex flex-col gap-3">
                                <div className="flex flex-col lg:flex-row gap-6 items-center">
                                    <div className="flex-1 flex flex-col gap-2">
                                        {sec1.heading ? (
                                            <p className="text-sm md:text-base text-ayda-pink-light capitalize font-medium text-center">
                                                {sec1.heading}
                                            </p>
                                        ) : null}
                                        {sec1.html ? (
                                            <div className="text-sm md:text-base text-ayda-gray-dark flex flex-col gap-1">
                                                <div dangerouslySetInnerHTML={{ __html: sec1.html }} />
                                            </div>
                                        ) : null}
                                    </div>
                                </div>
                            </div>
                        ) : null}
                    </div>
                </div>
            </div>
        </main>
    );
}
