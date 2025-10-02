import { Locale, getTreatment } from "@/lib/cms";
import TreatmentDetail from "@/components/ui/TreatmentDetail";

export default async function Page({ params }: { params: { locale: Locale } }) {
    const data = await getTreatment(params.locale, "tedaviler/prp");
    return <TreatmentDetail data={data} />;
}
